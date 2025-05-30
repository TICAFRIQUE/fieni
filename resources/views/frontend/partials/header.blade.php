<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="@yield('meta_description', 'Fieni - web')" />
    <meta name="keywords" content="@yield('meta_keywords', 'Fieni, web, application')" />
    <meta name="author" content="@yield('meta_author', 'Fieni Team')" />
    <meta name="robots" content="@yield('meta_robots', 'index, follow')" />
    <meta name="theme-color" content="#ffffff" />
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />

    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('assets_web/images/favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('assets_web/images/favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('assets_web/images/favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets_web/images/favicon_io/site.webmanifest') }}" />




    <!--====== SEO ======-->

    <meta property="og:title" content="{{ config('app.name', 'Fieni') }} - @yield('title')" />
    <meta property="og:description" content="@yield('meta_description', 'Fieni - web')" />
    <meta property="og:image" content="{{ asset('assets_web/images/favicon_io/android-chrome-512x512.png') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="{{ config('app.name', 'Fieni') }}" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ config('app.name', 'Fieni') }} - @yield('title')" />
    <meta name="twitter:description" content="@yield('meta_description', 'Fieni - web')" />
    <meta name="twitter:image" content="{{ asset('assets_web/images/favicon_io/android-chrome-512x512.png') }}" />

    <!--====== Title ======-->
    <title>{{ config('app.name', 'Fieni') }} - @yield('title', 'web')</title>
    @include('frontend.links.css')
</head>
