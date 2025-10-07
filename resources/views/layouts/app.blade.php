<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Birthday Website')</title>

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.3/dist/tailwind.min.css" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Page Specific Styles -->
    @yield('styles')
</head>
<body class="bg-pink-100 overflow-x-hidden">
    @yield('content')

    <!-- Page Specific Scripts -->
    @yield('scripts')
</body>
</html>

