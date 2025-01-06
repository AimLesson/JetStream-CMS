@extends('layouts.app')

@section('title', $news->title)

@section('content')
<div class="container mx-auto py-10">
    <!-- News Title -->
    <h1 class="text-3xl font-bold mb-4">{{ $news->title }}</h1>

    <!-- Metadata: Author and Date -->
    <div class="text-gray-600 mb-6">
        <p>By <span class="font-semibold">{{ $news->author }}</span></p>
        <p>Published on {{ $news->created_at->format('F j, Y') }}</p>
    </div>

    <!-- News Image -->
    @if ($news->image)
        <img src="{{ asset('storage/' . $news->image) }}" 
             alt="{{ $news->title }}" 
             class="w-full h-auto rounded mb-6">
    @endif

    <!-- News Content -->
    <div class="bg-white rounded shadow-md p-6">
        <p>{!! $news->content !!}</p>
    </div>

    <!-- YouTube Embed -->
    @if ($news->youtube_link)
        @php
            $urlParts = parse_url($news->youtube_link);
            parse_str($urlParts['query'] ?? '', $query);
            $videoId = $query['v'] ?? null;
        @endphp

        @if ($videoId)
            <div class="mt-6">
                <h3 class="text-lg font-bold mb-2">Watch on YouTube</h3>
                <div class="relative" style="padding-top: 56.25%; /* Aspect ratio 16:9 */">
                    <iframe 
                        class="absolute top-0 left-0 w-full h-full rounded-lg" 
                        src="https://www.youtube.com/embed/{{ $videoId }}" 
                        frameborder="0" 
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        @endif
    @endif





    <!-- Instagram Embed -->
    @if ($news->instagram_link)
        <div class="mt-6">
            <h3 class="text-lg font-bold mb-2">Instagram Post</h3>
            <blockquote class="instagram-media">
                <a href="{{ $news->instagram_link }}" target="_blank">
                    View Instagram Post
                </a>
            </blockquote>
        </div>
    @endif

    <!-- TikTok Embed -->
    @if ($news->tiktok_link)
        @php
            // Parse the TikTok URL to extract the video ID
            preg_match('/\/video\/(\d+)/', $news->tiktok_link, $matches);
            $tiktokVideoId = $matches[1] ?? null; // Get the video ID if it exists
        @endphp

        @if ($tiktokVideoId)
            <div class="mt-6">
                <h3 class="text-lg font-bold mb-2">Watch on TikTok</h3>
                <blockquote class="tiktok-embed">
                    <iframe class="w-auto h-auto rounded"
                            src="https://www.tiktok.com/embed/v2/{{ $tiktokVideoId }}"
                            frameborder="0"
                            allowfullscreen>
                    </iframe>
                </blockquote>
                <script async src="https://www.tiktok.com/embed.js"></script>
            </div>
        @else
            <p class="text-red-500">Invalid TikTok link provided.</p>
        @endif
    @endif

</div>
@endsection
