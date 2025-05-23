<?php

namespace App\Models\Traits;

use App\Models\Like;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Pagination\AbstractCursorPaginator;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;

trait Liker
{
    public function like(Model $object): Like
    {
        $attributes = [
            'likeable_type' => $object->getMorphClass(),
            'likeable_id' => $object->getKey(),
            config('like.user_foreign_key') => $this->getKey(),
        ];

        $like = \app(config('like.like_model'));

        return $like->where($attributes)->firstOr(
            function () use ($like, $attributes) {
                return $like->unguarded(function () use ($like, $attributes) {
                    if ($this->relationLoaded('likes')) {
                        $this->unsetRelation('likes');
                    }

                    return $like->create($attributes);
                });
            }
        );
    }

    /**
     * @throws \Exception
     */
    public function unlike(Model $object): bool
    {
        $relation = \app(config('like.like_model'))
            ->where('likeable_id', $object->getKey())
            ->where('likeable_type', $object->getMorphClass())
            ->where(config('like.user_foreign_key'), $this->getKey())
            ->first();

        if ($relation) {
            if ($this->relationLoaded('likes')) {
                $this->unsetRelation('likes');
            }

            return $relation->delete();
        }

        return true;
    }

    /**
     * @return Like|null
     *
     * @throws \Exception
     */
    public function toggleLike(Model $object)
    {
        return $this->hasLiked($object) ? $this->unlike($object) : $this->like($object);
    }

    public function hasLiked(Model $object): bool
    {
        return ($this->relationLoaded('likes') ? $this->likes : $this->likes())
            ->where('likeable_id', $object->getKey())
            ->where('likeable_type', $object->getMorphClass())
            ->count() > 0;
    }

    public function likes(): HasMany
    {
        return $this->hasMany(config('like.like_model'), config('like.user_foreign_key'), $this->getKeyName());
    }

    /**
     * Get Query Builder for likes.
     */
    public function getLikedItems(string $model): Builder
    {
        return app($model)->whereHas(
            'likers',
            function ($q) {
                return $q->where(config('like.user_foreign_key'), $this->getKey());
            }
        );
    }

    public function attachLikeStatus(&$likeables, callable $resolver = null)
    {
        $likes = $this->likes()->get()->keyBy(function ($item) {
            return \sprintf('%s:%s', $item->likeable_type, $item->likeable_id);
        });

        $attachStatus = function ($likeable) use ($likes, $resolver) {
            $resolver = $resolver ?? fn ($m) => $m;
            $likeable = $resolver($likeable);

            if ($likeable && \in_array(Likeable::class, \class_uses_recursive($likeable))) {
                $key = \sprintf('%s:%s', $likeable->getMorphClass(), $likeable->getKey());
                $likeable->setAttribute('has_liked', $likes->has($key));
            }

            return $likeable;
        };

        switch (true) {
            case $likeables instanceof Model:
                return $attachStatus($likeables);
            case $likeables instanceof Collection:
                return $likeables->each($attachStatus);
            case $likeables instanceof LazyCollection:
                return $likeables = $likeables->map($attachStatus);
            case $likeables instanceof AbstractPaginator:
            case $likeables instanceof AbstractCursorPaginator:
                return $likeables->through($attachStatus);
            case $likeables instanceof Paginator:
                // custom paginator will return a collection
                return collect($likeables->items())->transform($attachStatus);
            case \is_array($likeables):
                return \collect($likeables)->transform($attachStatus);
            default:
                throw new \InvalidArgumentException('Invalid argument type.');
        }
    }

    protected function totalLikes(): Attribute
    {
        return Attribute::make(get: function ($value) {
            return $this->likes()->count() ?? 0;
        });
    }
}
