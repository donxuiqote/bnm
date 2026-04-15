<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>eCommerce Dashboard</title>
    @vite(['public/tailadmin/build/style.css', 'resources/js/app.js'])
</head>
<body
    x-data="{ page: 'ecommerce', loaded: true, darkMode: false, stickyMenu: false, sidebarToggle: false, scrollTop: false }"
    x-init="
        darkMode = JSON.parse(localStorage.getItem('darkMode'));
        $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))
    "
    :class="{ 'dark bg-gray-900': darkMode === true }">
    @include('dashboard.partials.preloader')
    <div class="flex h-screen overflow-hidden">
        @include('dashboard.partials.sidebar')
        <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
            @include('dashboard.partials.overlay')
            @include('dashboard.partials.header')
            <main>
                <div class="p-4 mx-auto max-w-7xl md:p-6">
                @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>
</html>