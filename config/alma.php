<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Author Information
    |--------------------------------------------------------------------------
    |
    | The details of the script author.
    |
     */

    'author' => [
        'name' => 'Devklan',
        'support' => 'https://t.me/devklan',
        'website' => 'https://devklan.com',
    ],

    /*
    |--------------------------------------------------------------------------
    | Item Information
    |--------------------------------------------------------------------------
    |
    | Information about the item.
    |
     */

    'item' => [
        'name' => 'Alma',
        'type' => 'core',
        'version' => '3.0',
    ],

    /*
    |--------------------------------------------------------------------------
    | Demo Mode
    |--------------------------------------------------------------------------
    |
    | Enable or disable the system demo mode.
    |
     */

    'demo_mode' => env('DEMO_MODE', false),

    /*
    |--------------------------------------------------------------------------
    | Progressive Web App
    |--------------------------------------------------------------------------
    |
    | Enable or disable the PWA.
    |
     */
    'pwa_active' => true,

    /*
    |--------------------------------------------------------------------------
    | Cookie Consent
    |--------------------------------------------------------------------------
    |
    | Enable or disable the Cookie.
    |
     */
    'cookie_active' => true,

    /*
    |--------------------------------------------------------------------------
    | Auto-approval of posts
    |--------------------------------------------------------------------------
    |
    | Enable or disable auto-approval of posts.
    |
     */
    'posts_auto_approval' => true,

    /*
    |--------------------------------------------------------------------------
    | Registeration in the system
    |--------------------------------------------------------------------------
    |
    | Enable or disable registeration.
    |
     */
    'registration' => false,

    /*
    |--------------------------------------------------------------------------
    | Appearance
    |--------------------------------------------------------------------------
    |
    | The appearance data configiration.
    |
     */
    'default_feed' => 'popular',
    'appearance' => [
        'default_font' => 'Roboto',
        'theme' => 'blue',
        'header_color' => '#d9f0ff',
        'radius' => '0.5',
    ],

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode
    |--------------------------------------------------------------------------
    |
    | The system maintenance mode data.
    |
     */
    'maintenance' => [
        'title' => '',
        'message' => '',
        'secret' => 'fab750a1-2b0nd-4098-8d7b-9b132500a84a',
    ],

    /*
    |--------------------------------------------------------------------------
    | Cronjob
    |--------------------------------------------------------------------------
    |
    | The cronjob data.
    |
     */

    'cronjob' => [
        'key' => 'Ovi1aha0wwNCsNJketp7llHW2ur35nNm',
        'last_execution' => '2024-11-12 13:53:43',
    ],

    /*
   |--------------------------------------------------------------------------
   | Legacy
   |--------------------------------------------------------------------------
   |
   | The legacy data configiration.
   |
    */
    'common_images_directory_name' => env('COMMON_IMAGES', 'media'),

    'social_profile_links' => [
        'facebook' => 'https://www.facebook.com/devklan',
        'twitter_x' => 'https://www.twitter.com/devklan',
        'instagram' => 'https://www.instagram.com/devklan',
        'tiktok' => 'https://www.tiktok.com/devklan',
        'twitch' => '',
        'vk' => '',
        'discord' => '',
        'telegram' => 'https://t.me/devklan',
    ],
];
