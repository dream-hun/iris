<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home - {{ config('app.name', 'Laravel') }}</title>
    <!-- SEO Meta Tags -->
    <meta name="description" content="Professional photography services at Irispicture. Book your photoshoot today and capture your special moments with our expert photographers.">
    <meta name="keywords" content="photography, professional photographer, photo session, photoshoot, portrait, event photography">
    <meta name="author" content="{{ config('app.name', 'Irispicture') }}">

    <!-- Open Graph / Social Media Meta Tags -->
    <meta property="og:title" content="Home - {{ config('app.name', 'Irispicture') }}">
    <meta property="og:description" content="Professional photography services at Irispicture. Transform your moments into lasting memories.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/iris-hero.webp') }}">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Home - {{ config('app.name', 'Irispicture') }}">
    <meta name="twitter:description" content="Professional photography services at Irispicture. Book your dream photoshoot today.">
    <meta name="twitter:image" content="{{ asset('images/iris-hero.webp') }}">
    <!-- Fonts -->
    <link rel="preload" href="https://rsms.me/inter/inter.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://rsms.me/inter/inter.css"></noscript>

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased">
    <x-navigation-bar-component />

    <div class="relative backdrop-blur-md text-black min-[520px] py-32">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/stripes.svg') }}" alt="Background" class="w-full h-full object-cover opacity-50">
        </div>

        <!-- Content -->
        <div class="relative z-10 max-w-6xl mx-auto px-4 py-20 text-center">
            <h1 class="text-5xl md:text-6xl font-bold mb-4">
                @if ($content->home_title)
                    {{ $content->home_title }}
                @else
                    Welcome to Irispicture

                @endif
            </h1>
            <div class="relative mb-8">
                <p class="text-gray-600 text-lg mb-8">
                    @if ($content->home_description)
                        {{ $content->home_description }}
                    @else
                      Where Every Moment Becomes a Masterpiece!

                    @endif

                </p>
            </div>
            <a class="bg-yellow-400 text-black px-8 py-3 rounded-full hover:bg-yellow-300 transition-colors duration-200"
                href="{{ route('booking.index') }}">
                @if ($content->home_button_text)
                    {{ $content->home_button_text }}
                @else
                    Book Your Photoshoot Today!

                @endif

            </a>
        </div>
    </div>

    <!-- Image Grid -->
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-20">


        @forelse($images as $image)
            <!-- Large Image 1 -->
            <div class="aspect-w-4 aspect-h-5">
                <img src="{{ $image->getFirstMediaUrl('featured_image') }}" alt="{{$image->title}}" class="w-full h-auto object-cover" />
            </div>
        @empty
            <!-- Large Image 1 -->
            <div class="aspect-w-4 aspect-h-5">
                <img src="{{ asset('images/iris-hero.webp') }}" alt="Urban overpass" class="w-full h-auto object-cover" />
            </div>
            <div class="aspect-w-4 aspect-h-5">
                <img src="{{ asset('images/iris-hero.webp') }}" alt="Urban overpass" class="w-full h-auto object-cover" />
            </div>
            <div class="aspect-w-4 aspect-h-5">
                <img src="{{ asset('images/iris-hero.webp') }}" alt="Urban overpass" class="w-full h-auto object-cover" />
            </div>
        @endforelse


    </div>
    <x-about-component />
    <x-gallery-component id="gallery" />
    <x-footer-component />

</body>

</html>
