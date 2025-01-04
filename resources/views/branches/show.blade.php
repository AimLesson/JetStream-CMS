@extends('layouts.branch')

@section('title', $branch->name)

@section('content')
<div class="container mx-auto py-10">
    <!-- Carousel for Latest News -->
    <div id="carouselExample" class="relative w-full mb-10" data-carousel="static">
        <div class="relative h-96 overflow-hidden rounded-lg">
            @foreach ($newsList->take(3) as $news)
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('storage/' . $news->image) }}" class="block w-full h-full object-cover" alt="{{ $news->title }}">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center text-white text-xl font-bold p-4">
                        {{ $news->title }}
                    </div>
                </div>
            @endforeach
        </div>
        <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white/30 group-hover:bg-white/50">
                <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
            </span>
        </button>
        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white/30 group-hover:bg-white/50">
                <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1l4 4-4 4"/>
                </svg>
            </span>
        </button>
    </div>

    <!-- Branch News -->
    <h2 class="text-2xl font-bold mb-6">News from {{ $branch->name }}</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($newsList as $news)
            <div class="bg-white rounded shadow-md overflow-hidden">
                <img src="{{ asset('storage/' . $news->image) }}" class="w-full h-48 object-cover" alt="{{ $news->title }}">
                <div class="p-4">
                    <h3 class="font-bold text-lg">{{ $news->title }}</h3>
                    <p class="text-gray-600 text-sm">{{ $news->created_at->format('F j, Y') }}</p>
                    <p class="text-gray-700 mt-2 line-clamp-3">{{ Str::limit(strip_tags($news->content), 100, '...') }}</p>
                    <a href="{{ route('news.show', $news->id) }}" class="text-blue-500 hover:underline mt-4 block">Read More</a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-6">
        {{ $newsList->links() }}
    </div>
</div>
@endsection
