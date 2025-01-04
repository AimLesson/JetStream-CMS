<x-filament::page>
    <div class="space-y-6">
        <h1 class="text-2xl font-bold">{{ $news->title }}</h1>
        
        <div class="flex items-center space-x-4">
            <p class="text-gray-600">Author: {{ $news->author }}</p>
            <p class="text-gray-600">Published: {{ $news->created_at->format('F j, Y') }}</p>
        </div>

        <div>
            @if($news->image)
                <img src="{{ Storage::url($news->image) }}" alt="News Image" class="w-full max-h-96 object-cover rounded-lg">
            @endif
        </div>

        <div class="prose">
            {!! $news->content !!}
        </div>

        {{-- YouTube Embed --}}
        @if($news->youtube_link)
            <div class="mt-6">
                <iframe 
                    width="100%" 
                    height="315" 
                    src="{{ str_replace('watch?v=', 'embed/', $news->youtube_link) }}" 
                    title="YouTube video player" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
            </div>
        @endif

        {{-- Instagram Embed --}}
        @if($news->instagram_link)
            <div class="mt-6">
                <iframe 
                    src="https://www.instagram.com/embed?url={{ $news->instagram_link }}" 
                    width="400" 
                    height="480" 
                    frameborder="0" 
                    scrolling="no" 
                    allowtransparency="true">
                </iframe>
            </div>
        @endif

        {{-- TikTok Embed --}}
        @if($news->tiktok_link)
            <div class="mt-6">
                <blockquote class="tiktok-embed" cite="{{ $news->tiktok_link }}" style="max-width: 605px;min-width: 325px;">
                    <iframe 
                        src="{{ $news->tiktok_link }}" 
                        width="325" 
                        height="500" 
                        frameborder="0" 
                        allowfullscreen>
                    </iframe>
                </blockquote>
            </div>
        @endif
    </div>
</x-filament::page>
