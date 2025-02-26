<!-- Navigation Component -->
<nav x-data="{ isOpen: false }" class="border-b border-gray-200 bg-white py-1 top-0 sticky z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Left Navigation -->
            <div class="hidden md:flex space-x-8">
                <a href="{{ route('index') }}" class="text-gray-600 hover:text-gray-900 transition-colors duration-200">
                    Home
                </a>
                <a href="{{ route('services.index') }}"
                    class="text-gray-600 hover:text-gray-900 transition-colors duration-200">
                    Services
                </a>
                <a href="{{ route('index') }}#gallery"
                    class="text-gray-600 hover:text-gray-900 transition-colors duration-200 scroll-smooth"
                    onclick="document.getElementById('gallery').scrollIntoView({ behavior: 'smooth' }); return false;">
                    Gallery
                </a>

            </div>

            <!-- Center Logo -->
            <div class="flex flex-col items-center">
                <h1 class="text-xl font-extrabold text-gray-900">Iris Pictures</h1>
                <p class="text-md font-semibold text-gray-500 uppercase tracking-wider">Your Go to Photography</p>
            </div>

            <!-- Right Social Icons & CTA -->
            <div class="hidden md:flex items-center space-x-6">
                <a href="{{ $setting->instagram ?? '' }}" target="_blank"
                    class="text-gray-600 hover:text-gray-900 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-instagram">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                    </svg>
                </a>
                <a href="{{ $setting->tiktok ?? '' }}" target="_blank"
                    class="text-gray-600 hover:text-gray-900 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path
                            d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3z" />
                    </svg>
                </a>
                <a class="bg-black text-white px-4 py-2 rounded-full hover:bg-yellow-400 hover:text-black transition-colors duration-200"
                    href="{{ route('booking.index') }}">
                    Book a session
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button @click="isOpen = !isOpen" class="text-gray-600 hover:text-gray-900 focus:outline-none">
                    <svg class="h-6 w-6" :class="{ 'hidden': isOpen, 'block': !isOpen }" stroke="currentColor"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="h-6 w-6" :class="{ 'block': isOpen, 'hidden': !isOpen }" stroke="currentColor"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div class="md:hidden" x-show="isOpen" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-95">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{ route('index') }}" class="block px-3 py-2 text-gray-600 hover:text-gray-900">Home</a>
            <a href="{{ route('services.index') }}"
                class="block px-3 py-2 text-gray-600 hover:text-gray-900">Services</a>
            <a href="#gallery" class="block px-3 py-2 text-gray-600 hover:text-gray-900"
                onclick="document.getElementById('gallery').scrollIntoView({ behavior: 'smooth' }); return false;">
                Gallery
            </a>
            <div class="flex space-x-4 px-3 py-2">
                <a href="{{ $setting->instagram ?? '' }}" class="text-gray-600 hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-instagram" viewBox="0 0 16 16">
                        <path
                            d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                    </svg>
                </a>
                <a href="{{ $setting->tiktok ?? '' }}" class="text-gray-600 hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-tiktok" viewBox="0 0 16 16">
                        <path
                            d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3z" />
                    </svg>
                </a>
            </div>
            <button
                class="w-full bg-black text-white px-4 py-2 rounded-full hover:bg-yellow-400 hover:text-black transition-colors duration-200">
                Let's Talk
            </button>
        </div>
    </div>
</nav>
