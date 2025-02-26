<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - {{ config('app.name') }}</title>
    <meta name="description"
        content="Professional photography services and portfolio showcase. Capturing life's beautiful moments with artistic vision in canada.">
    <meta name="keywords"
        content="photography, professional photographer, photo portfolio, portraits, events, wedding photography,canada">
    <meta name="author" content="Irispictures">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Irispictures - Professional Photography">
    <meta property="og:description" content="Professional photography services and portfolio showcase.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Scripts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased dark:bg-gray-900 dark:text-white">
    <x-navigation-bar-component />
    <div class="relative backdrop-blur-md text-black min-[620px] py-24">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/stripes.svg') }}" alt="Background" class="w-full h-full object-cover opacity-50">
        </div>

        <!-- Content -->
        <div class="relative z-10 max-w-6xl mx-auto px-4 py-20 text-center">
            <h1 class="text-5xl md:text-6xl font-bold mb-4">
                Services We offer
            </h1>
            <div class="relative mb-8">
                <p class="text-gray-600 text-lg mb-8">
                    Where Every Moment Becomes a Masterpiece!
                </p>
            </div>
            <button
                class="bg-yellow-400 text-black px-8 py-3 rounded-full hover:bg-yellow-300 transition-colors duration-200">
                Book Your Photoshoot Today!
            </button>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 pt-12 pb-32">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($services as $service)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                    <!-- Featured Image -->
                    <div class="aspect-w-16 aspect-h-9">
                        @if ($service->featured_image)
                            <img src="{{ $service->getFirstMediaUrl('featured_image') }}" alt="{{ $service->name }}"
                                class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        @endif
                    </div>

                    <!-- Service Details -->
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">{{ $service->name }}</h3>
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-bold text-yellow-500">{{ $service->formatedPrice() }}</span>
                            <span class="text-gray-600 dark:text-gray-400">{{ $service->duration }}</span>
                        </div>

                        <!-- Book Now Button -->
                        <a href="{{ route('booking.index', ['service' => $service->id]) }}"
                            class="mt-4 w-full inline-flex justify-center items-center px-4 py-2 bg-yellow-400 text-black rounded-full hover:bg-yellow-300 transition-colors duration-200">
                            Book Now
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <x-footer-component />
</body>

</html>
