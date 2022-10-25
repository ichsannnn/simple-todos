<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}">
    @livewireStyles
    @yield('styles')
</head>

<body>
<div id="app">
    <div id="main" class="layout-horizontal">
        <x-header />
        <div class="content-wrapper container">
            @yield('content')
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/pages/horizontal-layout.js') }}"></script>
@livewireScripts
@yield('scripts')
</body>

</html>
