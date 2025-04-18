@php
    if (isAppInstalled()) {
        $favicon = settings()->group('general')->get('site_favicon');
        $favicon = !empty($favicon) ? Storage::disk(getCurrentDisk())->url($favicon) : asset('/images/favicon.png');
        $google_analytics_code = settings()->group('advanced')->get('google_analytics_code');
        $custom_head_code = settings()->group('advanced')->get('custom_head_code');
        $custom_footer_code = settings()->group('advanced')->get('custom_footer_code');
    } else {
        $favicon = asset('/images/favicon.png');
        $google_analytics_code = '';
        $custom_head_code = '';
        $custom_footer_code = '';
    }
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="shortcut icon" href="{{ $favicon }}" type="image/png">
    @inertiaHead
    @if (config('alma.pwa_active') === true)
        @include('partials.pwa')
    @endif
    @include('feed::links')
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family={{ str_replace(' ', '+', config('alma.appearance.default_font')) }}:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- Styles -->
    <style>
        .font-sans {
            font-family: @php echo config('alma.appearance.default_font')
        @endphp
        ,
        sans-serif !important;
        }
    </style>
    @if ($google_analytics_code !== '')
        {!! $google_analytics_code !!}
    @endif
    @if ($custom_head_code !== '')
        {!! $custom_head_code !!}
    @endif
    <!-- Scripts -->
    @routes
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
</head>

<body class="font-sans antialiased">
    @inertia
    @if ($custom_footer_code !== '')
        {!! $custom_footer_code !!}
    @endif
</body>

</html>
