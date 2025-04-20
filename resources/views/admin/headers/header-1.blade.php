<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    @if(Session::has('Success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4  rounded">
        {{ Session::get('Success') }}
    </div>
@endif

@if(Session::has('error'))
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4  rounded">
        {{ Session::get('error') }}
    </div>
@endif
