@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!-- Carousel -->
<div id="carouselExample" class="relative w-full" data-carousel="static">
    <!-- Carousel Wrapper -->
    <div class="relative h-96 lg:h-[600px] overflow-hidden rounded-lg">
        @foreach ($latestNews as $index => $news)
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ $news->image ? asset('storage/' . $news->image) : asset('images/default.jpg') }}" 
                     class="block w-full h-full object-cover" 
                     alt="{{ $news->title }}">
                <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center text-white text-xl font-bold p-4">
                    {{ $news->title }}
                </div>
            </div>
        @endforeach
    </div>

    <!-- Carousel Controls -->
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


<section 
    class="relative bg-cover bg-center mt-10 border shadow" 
    style="background-image: url('https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-2.png');">
    <!-- Overlay for opacity -->
    <div class="absolute inset-0 bg-black opacity-50"></div>

    <!-- Content -->
    <div class="relative gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
        <div class="font-light text-gray-50 sm:text-lg">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-50">{{ $profile->name }}</h2>
            <p class="mb-4 text-justify">{!! $profile->about !!}</p>
        </div>
        <div class="grid grid-cols-2 gap-4 mt-8">
            <img class="w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-2.png" alt="office content 1">
            <img class="mt-4 w-full lg:mt-10 rounded-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-1.png" alt="office content 2">
        </div>

    </div>
</section>


<!-- News Cards -->
<div class="mx-auto pb-10 mt-10 p-4">
    <h2 class="text-2xl font-bold mb-6">Latest News</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($newsList as $news)
            <div class="bg-white rounded shadow-md overflow-hidden">
                <!-- News Image -->
                <img src="{{ $news->image ? asset('storage/' . $news->image) : asset('images/default.jpg') }}" 
                alt="{{ $news->title }}" 
                class="w-full h-48 object-cover">
                           
                <!-- News Content -->
                <div class="p-4">
                    <h3 class="font-bold text-lg">{{ $news->title }}</h3>
                    <p class="text-gray-600 text-sm">{{ optional($news->created_at)->format('F j, Y') }}</p>
                    <p class="text-gray-700 mt-2 line-clamp-3">{{ Str::limit(strip_tags($news->content), 100, '...') }}</p>
                    <a href="{{ route('news.show', $news->id) }}" class="text-blue-500 hover:underline mt-4 block">Read More</a>
                </div>
            </div>
        @endforeach
    </div>
        <div class="mt-6">
            {{ $newsList->links('pagination::tailwind') }}
        </div>
</div>




@endsection
