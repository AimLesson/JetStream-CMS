@extends('layouts.branch')

@section('title', $branch->name)

@section('content')

    {{-- Hero Section --}}
    <section class="mx-auto max-w-screen-12xl px-4 md:px-8 bg-black/50 py-4">
        <div class="mb-8 flex flex-wrap justify-between md:mb-16">
            <div class="mb-6 flex w-full flex-col justify-center sm:mb-12 lg:mb-0 lg:w-1/3 lg:pb-24 lg:pt-48">
                <h1 class="mb-4 text-4xl font-bold text-white sm:text-5xl md:mb-8 md:text-6xl">{{ $branch->name }}</h1>

                <p class="max-w-md leading-relaxed text-gray-100 xl:text-lg">{!! $branch->company_profile !!}</p>
            </div>

            <div class="mb-12 flex w-full md:mb-16 lg:w-2/3">
                <div
                    class="relative left-12 top-12 z-10 -ml-12 overflow-hidden rounded-lg bg-gray-100 shadow-lg md:left-16 md:top-16 lg:ml-0">
                    <img src="{{ asset('storage/' . $branch->banner1) }}"
                        loading="lazy" alt="Photo by Kaung Htet" class="h-full w-full object-cover object-center" />
                </div>

                <div class="overflow-hidden rounded-lg bg-gray-100 shadow-lg">
                    <img src="{{ asset('storage/' . $branch->banner2) }}"
                        loading="lazy" alt="Photo by Manny Moreno" class="h-full w-full object-cover object-center" />
                </div>
            </div>
        </div>
    </section>

        {{-- VISI --}}
        <div class="bg-black/50 py-6 sm:py-8 lg:py-12">
            <div class="mx-auto max-w-screen-12xl px-4 md:px-8">
                <div class="h-1 bg-gray-200 rounded overflow-hidden mb-10">
                    <div class="w-24 h-full bg-blue-500"></div>
                </div>
              <h2 class="mb-4 text-center text-3xl font-extrabold text-indigo-400 md:mb-6 lg:text-3xl">VISI</h2>      
                <p class="mx-auto max-w-screen-md text-center font-bold text-gray-50 md:text-xl">
                {!! str_replace(['<p>', '</p>'], '', $branch->visi) !!}
                </p>
            </div>
        </div>
    
        {{-- MISI --}}
        <div class="bg-black/50 py-6 sm:py-8 lg:py-12">
            <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                <h2 class="mb-4 text-center text-3xl font-extrabold text-indigo-400 md:mb-6 lg:text-3xl">MISI</h2>      
                <div class="mx-auto max-w-screen-lg font-bold text-center text-gray-50 md:text-lg">
                    {!! $branch->misi !!}
                </div>            
            </div>
        </div>

        {{-- Berita --}}
        <section class="text-gray-600 body-font">
            <div class="px-5 py-6 bg-black/50">
                <div class="flex flex-col">
                    <div class="h-1 bg-gray-200 rounded overflow-hidden">
                        <div class="w-24 h-full bg-blue-500"></div>
                    </div>
                    <div class="flex flex-wrap sm:flex-row flex-col py-6 ">
                        <h1 class="sm:w-2/5 text-gray-50 font-medium title-font text-2xl mb-2 sm:mb-0">Berita Terbaru</h1>
                    </div>
                </div>
                <!-- Carousel -->
                <div id="carouselExample" class="relative w-full mb-4" data-carousel="static">
                    <!-- Carousel Wrapper -->
                    <div class="relative h-96 lg:h-[600px] overflow-hidden rounded-lg">
                        @foreach ($latestNews as $index => $news)
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="{{ $news->image ? asset('storage/' . $news->image) : asset('images/default.jpg') }}"
                                    class="block w-full h-full object-cover" alt="{{ $news->title }}">
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center text-white text-xl font-bold p-4">
                                    {{ $news->title }}
                                </div>
                            </div>
                        @endforeach
                    </div>
    
                    <!-- Carousel Controls -->
                    <button type="button"
                        class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-prev>
                        <span
                            class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white/30 group-hover:bg-white/50">
                            <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 6 10" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                            </svg>
                        </span>
                    </button>
                    <button type="button"
                        class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-next>
                        <span
                            class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white/30 group-hover:bg-white/50">
                            <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 6 10" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1l4 4-4 4" />
                            </svg>
                        </span>
                    </button>
                </div>
                <div class="grid gap-4 sm:grid-cols-2 md:gap-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-8">
                    <!-- article - start -->
                    @foreach ($newsList as $news)
                        <a href="{{ route('news.show', $news->id) }}"
                            class="group relative flex h-48 flex-col overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-64 xl:h-96">
                            <img src="{{ $news->image ? asset('storage/' . $news->image) : asset('images/default.jpg') }}"
                                loading="lazy" alt="Photo by Minh Pham"
                                class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
    
                            <div
                                class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 to-transparent md:via-transparent">
                            </div>
    
                            <div class="relative mt-auto p-4">
                                <span
                                    class="block text-sm text-gray-200">{{ optional($news->created_at)->format('F j, Y') }}</span>
                                <h2 class="mb-2 text-xl font-semibold text-white transition duration-100">{{ $news->title }}
                                </h2>
    
                                <span class="font-semibold text-indigo-300">Read more</span>
                            </div>
                        </a>
                    @endforeach
                    <!-- article - end -->
                </div>
                <div class="mt-6">
                    {{ $newsList->links('pagination::tailwind') }}
                </div>
            </div>
        </section>

        <section class="text-gray-600 body-font">
            <div class="px-5 py-6 bg-black/50">
                <div class="flex flex-col">
                    <div class="h-1 bg-gray-200 rounded overflow-hidden">
                        <div class="w-24 h-full bg-blue-500"></div>
                    </div>
                    <div class="flex flex-wrap sm:flex-row flex-col py-6">
                        <h1 class="sm:w-2/5 text-gray-50 font-medium title-font text-2xl mb-2 sm:mb-0">
                            Galeri {{ $branch->name }}
                        </h1>
                    </div>
                </div>
                <div class="grid gap-4 sm:grid-cols-2 md:gap-6 lg:grid-cols-3 xl:grid-cols-4">
                    <!-- Gallery Item Start -->
                    @foreach ($gallery as $news)
                        <div class="relative group {{ $loop->index % 6 === 0 ? 'col-span-2 row-span-2' : 'col-span-1' }}">
                            <img
                                alt="gallery"
                                class="w-full h-full object-cover object-center"
                                src="{{ asset('storage/' . $news->image) }}"
                            />
                            <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 flex items-center justify-center transition duration-300">
                                <p class="text-white text-lg font-medium">{{ $news->title }}</p>
                            </div>
                        </div>
                    @endforeach
                    <!-- Gallery Item End -->
                </div>
            </div>
        </section>

<div class="container mx-auto py-10">
{{-- 
    <section 
        class="relative bg-cover bg-center mb-10 border shadow" 
        style="background-image: url('https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-2.png');"
    >
        <!-- Overlay for opacity -->
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <!-- Content -->
        <div class="relative gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
            <div class="font-light text-gray-50 sm:text-lg">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-50">{{ $branch->name }}</h2>
                <p class="mb-4 text-justify">{!! $branch->about !!}</p>
            </div>
            <div class="grid grid-cols-2 gap-4 mt-8">
                <img class="w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-2.png" alt="office content 1">
                <img class="mt-4 w-full lg:mt-10 rounded-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-1.png" alt="office content 2">
            </div>

        </div>
    </section>

<!-- Carousel for Latest News -->
@if ($newsList->count() > 0)
    <div id="carouselExample" class="relative w-full mb-10" data-carousel="static">
        <div class="relative h-96 overflow-hidden rounded-lg">
            @foreach ($newsList->take(3) as $news)
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ $news->image ? asset('storage/' . $news->image) : asset('images/default.jpg') }}"  alt="{{ $news->title }}">
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
@endif

<!-- Branch News -->
<h2 class="text-2xl font-bold mb-6 mt-20">News from {{ $branch->name }}</h2>
@if ($newsList->count() > 0)
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
@else
    <p class="text-gray-600 mt-4">No news yet.</p>
@endif --}}

</div>
@endsection
