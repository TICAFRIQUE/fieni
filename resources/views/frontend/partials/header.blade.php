<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--====== Title ======-->
    <title>{{ config('app.name', 'Fieni') }} - @yield('title', 'web')</title>
    @include('frontend.links.css')
</head>
