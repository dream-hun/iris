<div class="max-w-7xl mx-auto px-4 py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
        <!-- Left Content -->
        <div class="space-y-8">
            <h1 class="text-4xl md:text-5xl font-bold">@if ($content->about_us_header)
                    {{ $content->about_us_header ?? '' }}
                @else
                    About us
                @endif
            </h1>

            <div class="space-y-6 text-gray-600">
                <p class="text-lg">
                    @if ($content->about_us_description)
                        {{ $content->about_us_description ?? '' }}
                    @else
                    Irispicture is an experienced photography service in Canada, capturing your best moments with
                    creativity and precision
                    @endif
                </p>
            </div>

            <!-- Accordion -->
            <div x-data="{ selected: 'journey' }" class="space-y-4">
                <!-- Mission -->
                <div class="border-t border-gray-200">
                    <button @click="selected = selected === 'journey' ? null : 'journey'"
                        class="w-full py-4 flex justify-between items-center text-left">
                        <span class="font-medium">@if ($content->mission_header)
                                {{ $content->mission_header ?? '' }}
                            @else
                                Mission
                            @endif</span>


                        <svg class="w-5 h-5 transform transition-transform"
                            :class="{ '-rotate-180': selected === 'journey' }" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path x-show="selected !== 'journey'" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            <path x-show="selected === 'journey'" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M5 15l7-7 7 7"></path>
                        </svg>
                    </button>
                    <div x-show="selected === 'journey'" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0" class="pb-4 text-gray-600">
                        @if ($content->mission_description)
                            {{ $content->mission_description ?? '' }}
                        @else
                        Capturing moments that tell your story, creating timeless memories through professional
                        photography services in Northern America.
                        @endif

                    </div>
                </div>

                <!-- My Vision -->
                <div class="border-t border-gray-200">
                    <button @click="selected = selected === 'philosophy' ? null : 'philosophy'"
                        class="w-full py-4 flex justify-between items-center text-left">
                        <span class="font-medium">@if ($content->vision_header)
                                {{ $content->vision_header ?? '' }}
                            @else
                                Vision
                            @endif</span>
                        <svg class="w-5 h-5 transform transition-transform"
                            :class="{ '-rotate-180': selected === 'philosophy' }" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div x-show="selected === 'philosophy'" x-transition class="pb-4 text-gray-600">
                        @if ($content->vision_description)
                            {{ $content->vision_description ?? '' }}
                        @else
                            To be the go-to photography service in Northern America, known for exceptional quality,
                            creativity, and client satisfaction, while making professional photography accessible to
                            everyone.
                        @endif

                    </div>
                </div>
            </div>
        </div>

        <!-- Right Image -->
        <div class="relative">
            <div class="absolute top-0 right-0 w-full h-full bg-yellow-400 -translate-y-4 translate-x-4"></div>
            <div class="relative">
                @if ($content->about_us_image)
                    <img src="{{ $content->getFirstMediaUrl('about_us_image') }}" alt="Photographer with cameras"
                        class="w-full object-cover" />
                @else
                    <img src="{{ asset('images/iris-hero-four.webp') }}" alt="Photographer with cameras"
                        class="w-full object-cover" />

                @endif

            </div>
        </div>
    </div>
</div>
