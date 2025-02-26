@props(['id' => 'gallery'])

<div {{ $attributes->merge(['class' => 'mx-auto max-w-7xl py-24', 'id' => $id]) }}>
    <div class="text-center">
        <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Gallery</h2>
        <p class="mt-4 text-lg text-gray-500">A collection of some of my best work</p>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 mt-5">
            @foreach($galleries as $index => $gallery)
                <div class="group relative overflow-hidden {{ $index === 0 || $index === 3 ? 'col-span-2 row-span-2' : ($index === 1 ? 'col-span-1 row-span-2' : 'col-span-1 row-span-1') }}">
                    @if($gallery->media->isNotEmpty())
                        <img src="{{ $gallery->media->first()->getUrl() }}" alt="{{ $gallery->title }}"
                            class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105" />
                    @endif
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                    </div>
                    <div
                        class="absolute bottom-0 left-0 right-0 p-4 text-white opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                        <h3 class="text-lg font-semibold">{{ $gallery->title }}</h3>
                        <p class="text-sm text-white/80">{{ $gallery->location }}, {{ $gallery->date?->format('F Y') }}</p>
                        <p class="text-xs text-white/60">{{ $gallery->camera }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
