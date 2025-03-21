<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking - Iris picture</title>
    <meta name="description"
        content="Professional photography services and portfolio showcase. Capturing life's beautiful moments with artistic vision in canada.">
    <meta name="keywords"
        content="photography, professional photographer, photo portfolio, portraits, events, wedding photography,canada">
    <meta name="author" content="MBABAZI Jacques">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Iris picture - Professional Photography">
    <meta property="og:description" content="Professional photography services and portfolio showcase.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-KWRD2MX2');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Scripts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased dark:bg-gray-900 dark:text-white">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KWRD2MX2" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <x-navigation-bar-component />
    <div class="relative backdrop-blur-md text-black min-[520px]">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/stripes.svg') }}" alt="Background" class="w-full h-full object-cover opacity-50">
        </div>

        <!-- Content -->
        <div class="relative z-10 max-w-6xl mx-auto px-4 py-20 text-center">
            <h1 class="text-5xl md:text-6xl font-bold mb-4">
                @if ($content->booking_title)
                    {{ $content->booking_title }}
                @else
                    Book a session with us today
                @endif


            </h1>
            <div class="relative mb-8">
                <p class="text-gray-600 text-lg mb-8">
                    @if ($content->booking_title_description)
                        {{ $content->booking_title_description }}
                    @else
                        Make memories with us.
                    @endif
                </p>
            </div>
        </div>
    </div>

    <div class="relative isolate bg-white">
        <div class="mx-auto grid max-w-7xl grid-cols-1 lg:grid-cols-2">
            <div class="relative px-6 pb-20 pt-24 sm:pt-32 lg:static lg:px-8 lg:py-48">
                <div class="mx-auto max-w-xl lg:mx-0 lg:max-w-lg">
                    <div
                        class="absolute inset-y-0 left-0 -z-10 w-full overflow-hidden bg-gray-100 ring-1 ring-gray-900/10 lg:w-1/2">
                        <svg class="absolute inset-0 h-full w-full stroke-gray-200 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]"
                            aria-hidden="true">
                            <defs>
                                <pattern id="83fd4e5a-9d52-42fc-97b6-718e5d7ee527" width="200" height="200"
                                    x="100%" y="-1" patternUnits="userSpaceOnUse">
                                    <path d="M130 200V.5M.5 .5H200" fill="none" />
                                </pattern>
                            </defs>
                            <rect width="100%" height="100%" stroke-width="0" fill="white" />
                            <svg x="100%" y="-1" class="overflow-visible fill-gray-50">
                                <path d="M-470.5 0h201v201h-201Z" stroke-width="0" />
                            </svg>
                            <rect width="100%" height="100%" stroke-width="0"
                                fill="url(#83fd4e5a-9d52-42fc-97b6-718e5d7ee527)" />
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900">
                        @if ($content->booking_title_address)
                            {{ $content->booking_title_address }}
                        @else
                            Get in touch
                        @endif
                    </h2>
                    <p class="mt-6 text-lg leading-8 text-gray-600">
                        @if ($content->booking_description_address)
                            {{ $content->booking_description_address }}
                        @else
                            We are here to help you with any questions you may have. Feel free to reach out to us.
                        @endif
                    </p>
                    <dl class="mt-10 space-y-4 text-base leading-7 text-gray-600">
                        <div class="flex gap-x-4">
                            <dt class="flex-none">
                                <span class="sr-only">Address</span>
                                <svg class="h-7 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                                </svg>
                            </dt>
                            <dd>{{ $setting->address ?? '' }}</dd>
                        </div>
                        <div class="flex gap-x-4">
                            <dt class="flex-none">
                                <span class="sr-only">Telephone</span>
                                <svg class="h-7 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                </svg>
                            </dt>
                            <dd><a class="hover:text-gray-900"
                                    href="tel:{{ $setting->mobile ?? '' }}">{{ $setting->mobile ?? '' }}</a>
                            </dd>
                        </div>
                        <div class="flex gap-x-4">
                            <dt class="flex-none">
                                <span class="sr-only">Email</span>
                                <svg class="h-7 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                            </dt>
                            <dd><a class="hover:text-gray-900"
                                    href="mailto:{{ $setting->email ?? '' }}">{{ $setting->email ?? '' }}</a>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
            <form action="{{ route('booking.store') }}" method="POST"
                class="px-6 pb-24 pt-20 sm:pb-32 lg:px-8 lg:py-48">
                @csrf
                <div class="mx-auto max-w-xl lg:mr-0 lg:max-w-lg">
                    @if ($errors->any())
                        <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div
                            class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                        <div>
                            <label for="name"
                                class="block text-sm font-semibold leading-6 text-gray-900">Name</label>
                            <div class="mt-2.5">
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    required minlength="3" maxlength="50"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm sm:leading-6 @error('name') ring-red-500 @enderror">
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="email"
                                class="block text-sm font-semibold leading-6 text-gray-900">Email</label>
                            <div class="mt-2.5">
                                <input type="email" name="email" id="email" value="{{ old('email') }}"
                                    required
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm sm:leading-6 @error('email') ring-red-500 @enderror">
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="mobile" class="block text-sm font-semibold leading-6 text-gray-900">Phone
                                number</label>
                            <div class="mt-2.5">
                                <input type="tel" name="mobile" id="mobile" value="{{ old('mobile') }}"
                                    required minlength="10" maxlength="15"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm sm:leading-6 @error('mobile') ring-red-500 @enderror">
                                @error('mobile')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="service_id"
                                class="block text-sm font-semibold leading-6 text-gray-900">Service</label>
                            <div class="mt-2.5">
                                <select name="service_id" id="service_id" required
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm sm:leading-6 @error('service_id') ring-red-500 @enderror">
                                    <option value="">Select a service</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}"
                                            {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                            {{ $service->name }} ({{ $service->duration }}
                                            / {{ $service->formatedPrice() }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('service_id')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="date_and_time"
                                class="block text-sm font-semibold leading-6 text-gray-900">Date and Time</label>
                            <div class="mt-2.5">
                                <input type="datetime-local" name="date_and_time" id="date_and_time"
                                    value="{{ old('date_and_time') }}" required min="{{ $minDate }}"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm sm:leading-6 @error('date_and_time') ring-red-500 @enderror">
                                @error('date_and_time')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end">
                        <button type="submit"
                            class="rounded-md bg-yellow-400 px-3.5 py-2.5 text-center text-sm font-semibold text-black shadow-sm hover:text-white hover:bg-gray-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-800">
                            Book a Session
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>




    <x-footer-component />

</body>

</html>
