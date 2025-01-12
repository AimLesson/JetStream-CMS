@extends('layouts.app')

@section('title', 'Home')

@section('content')

    {{-- Hero Section --}}
    <section class="mx-auto max-w-screen-12xl px-4 md:px-8 bg-black/50 py-4">
        <div class="mb-8 flex flex-wrap justify-between md:mb-16">
            <div class="mb-6 flex w-full flex-col justify-center sm:mb-12 lg:mb-0 lg:w-1/3 lg:pb-24 lg:pt-48">
                <h1 class="mb-4 text-4xl font-bold text-white sm:text-5xl md:mb-8 md:text-6xl">{{ $profile->name }}</h1>

                <p class="max-w-md leading-relaxed text-gray-100 xl:text-lg">{{ $profile->company_profile }}</p>
            </div>

            <div class="mb-12 flex w-full md:mb-16 lg:w-2/3">
                <div
                    class="relative left-12 top-12 z-10 -ml-12 overflow-hidden rounded-lg bg-gray-100 shadow-lg md:left-16 md:top-16 lg:ml-0">
                    <img src="{{ asset('storage/' . $profile->banner1) }}"
                        loading="lazy" alt="Photo by Kaung Htet" class="h-full w-full object-cover object-center" />
                </div>

                <div class="overflow-hidden rounded-lg bg-gray-100 shadow-lg">
                    <img src="{{ asset('storage/' . $profile->banner2) }}"
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
            {!! str_replace(['<p>', '</p>'], '', $profile->visi) !!}
            </p>
        </div>
    </div>

    {{-- MISI --}}
    <div class="bg-black/50 py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <h2 class="mb-4 text-center text-3xl font-extrabold text-indigo-400 md:mb-6 lg:text-3xl">MISI</h2>      
            <div class="mx-auto max-w-screen-lg font-bold text-center text-gray-50 md:text-lg">
                {!! $profile->misi !!}
            </div>            
        </div>
    </div>

    {{-- Stat --}}
    <div class="bg-black/50 py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-12xl px-4 md:px-8">
            <div class="h-1 bg-gray-200 rounded overflow-hidden mb-10">
                <div class="w-24 h-full bg-blue-500"></div>
            </div>
            <!-- text - start -->
            <div class="mb-10 md:mb-16">
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-50 md:mb-6 lg:text-3xl">Our Team by the numbers
                </h2>

                <p class="mx-auto max-w-screen-md text-center text-gray-50 md:text-lg">This is a section of some simple
                    filler text, also known as placeholder text. It shares some characteristics of a real written text but
                    is random or otherwise generated.</p>
            </div>
            <!-- text - end -->

            <div class="grid grid-cols-2 gap-8 md:grid-cols-3 md:gap-0 md:divide-x">
                <!-- stat - start -->
                <div class="flex flex-col items-center md:p-4">
                    <div class="text-xl font-bold text-indigo-400 sm:text-2xl md:text-3xl">200</div>
                    <div class="text-sm font-semibold sm:text-base text-gray-50">Sekolah</div>
                </div>
                <!-- stat - end -->

                <!-- stat - start -->
                <div class="flex flex-col items-center md:p-4">
                    <div class="text-xl font-bold text-indigo-400 sm:text-2xl md:text-3xl">500+</div>
                    <div class="text-sm font-semibold sm:text-base text-gray-50">Siswa</div>
                </div>

                <!-- stat - start -->
                <div class="flex flex-col items-center md:p-4">
                    <div class="text-xl font-bold text-indigo-400 sm:text-2xl md:text-3xl">1000+</div>
                    <div class="text-sm font-semibold sm:text-base text-gray-50">Tahun Pengabdian</div>
                </div>
                <!-- stat - end -->
            </div>
        </div>
    </div>

    {{-- SEKOLAH --}}
    <div class="bg-black/50 py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-12xl px-4 md:px-8">
            <div class="h-1 bg-gray-200 rounded overflow-hidden">
                <div class="w-24 h-full bg-blue-500"></div>
            </div>
            <div class="mb-6 flex items-end justify-between gap-4 mt-4">
                <h2 class="text-2xl font-bold text-gray-50 lg:text-3xl">Sekolah Kami</h2>
            </div>

            <div class="grid gap-x-4 gap-y-6 sm:grid-cols-2 md:gap-x-6 lg:grid-cols-4 xl:grid-cols-5">
                @foreach ($branch as $b)
                    <div>
                        <a href="{{ route('branches.show', $b->id) }}"
                            class="group mb-2 block h-96 overflow-hidden rounded-lg bg-gray-100 shadow-lg lg:mb-3">
                            <img src="{{ asset('storage/' . $b->logo) }}" loading="lazy" alt="Photo by Austin Wade"
                                class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                        </a>

                        <div class="flex flex-col">
                            <a href="{{ route('branches.show', $b->id) }}"
                                class="text-lg font-bold text-gray-100 transition duration-100 hover:text-gray-500 lg:text-xl">{{ $b->name }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Agenda --}}
    <section class="text-gray-600 body-font">
        <div class="px-5 py-6 bg-black/50">
            <div class="flex flex-col">
                <div class="h-1 bg-gray-200 rounded overflow-hidden">
                    <div class="w-24 h-full bg-blue-500"></div>
                </div>
                <div class="flex flex-wrap sm:flex-row flex-col py-6 ">
                    <h1 class="sm:w-2/5 text-gray-50 font-medium title-font text-2xl mb-2 sm:mb-0">Agenda Mendatang</h1>
                </div>
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

    {{-- Personalia --}}
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-xl px-4 md:px-8">
            <!-- text - start -->
            <div class="mb-10 md:mb-16">
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">Meet our Team</h2>

                <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">This is a section of some simple
                    filler text, also known as placeholder text. It shares some characteristics of a real written text but
                    is random or otherwise generated.</p>
            </div>
            <!-- text - end -->

            <div class="grid grid-cols-2 gap-x-4 gap-y-8 md:grid-cols-3 lg:gap-x-8 lg:gap-y-12">
                <!-- person - start -->
                <div>
                    <div class="mb-2 h-48 overflow-hidden rounded-lg bg-gray-100 shadow-lg sm:mb-4 sm:h-60 md:h-80">
                        <img src="https://images.unsplash.com/photo-1567515004624-219c11d31f2e??auto=format&q=75&fit=crop&w=500"
                            loading="lazy" alt="Photo by Radu Florin" class="h-full w-full object-cover object-center" />
                    </div>

                    <div>
                        <div class="font-bold text-indigo-500 md:text-lg">John McCulling</div>
                        <p class="mb-3 text-sm text-gray-500 md:mb-4 md:text-base">Founder / CEO</p>

                        <!-- social - start -->
                        <div class="flex">
                            <div class="flex gap-4">
                                <a href="#" target="_blank"
                                    class="text-gray-400 transition duration-100 hover:text-gray-500 active:text-gray-600">
                                    <svg class="h-5 w-5" width="24" height="24" viewBox="0 0 24 24"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                    </svg>
                                </a>

                                <a href="#" target="_blank"
                                    class="text-gray-400 transition duration-100 hover:text-gray-500 active:text-gray-600">
                                    <svg class="h-5 w-5" width="24" height="24" viewBox="0 0 24 24"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <!-- social - end -->
                    </div>
                </div>
                <!-- person - end -->

                <!-- person - start -->
                <div>
                    <div class="mb-2 h-48 overflow-hidden rounded-lg bg-gray-100 shadow-lg sm:mb-4 sm:h-60 md:h-80">
                        <img src="https://images.unsplash.com/photo-1532073150508-0c1df022bdd1?auto=format&q=75&fit=crop&w=500"
                            loading="lazy" alt="Photo by christian ferrer"
                            class="h-full w-full object-cover object-center" />
                    </div>

                    <div>
                        <div class="font-bold text-indigo-500 md:text-lg">Kate Berg</div>
                        <p class="mb-3 text-sm text-gray-500 md:mb-4 md:text-base">CFO</p>

                        <!-- social - start -->
                        <div class="flex">
                            <div class="flex gap-4">
                                <a href="#" target="_blank"
                                    class="text-gray-400 transition duration-100 hover:text-gray-500 active:text-gray-600">
                                    <svg class="h-5 w-5" width="24" height="24" viewBox="0 0 24 24"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                    </svg>
                                </a>

                                <a href="#" target="_blank"
                                    class="text-gray-400 transition duration-100 hover:text-gray-500 active:text-gray-600">
                                    <svg class="h-5 w-5" width="24" height="24" viewBox="0 0 24 24"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <!-- social - end -->
                    </div>
                </div>
                <!-- person - end -->

                <!-- person - start -->
                <div>
                    <div class="mb-2 h-48 overflow-hidden rounded-lg bg-gray-100 shadow-lg sm:mb-4 sm:h-60 md:h-80">
                        <img src="https://images.unsplash.com/photo-1463453091185-61582044d556?auto=format&q=75&fit=crop&w=500"
                            loading="lazy" alt="Photo by Ayo Ogunseinde"
                            class="h-full w-full object-cover object-center" />
                    </div>

                    <div>
                        <div class="font-bold text-indigo-500 md:text-lg">Greg Jackson</div>
                        <p class="mb-3 text-sm text-gray-500 md:mb-4 md:text-base">CTO</p>

                        <!-- social - start -->
                        <div class="flex">
                            <div class="flex gap-4">
                                <a href="#" target="_blank"
                                    class="text-gray-400 transition duration-100 hover:text-gray-500 active:text-gray-600">
                                    <svg class="h-5 w-5" width="24" height="24" viewBox="0 0 24 24"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                    </svg>
                                </a>

                                <a href="#" target="_blank"
                                    class="text-gray-400 transition duration-100 hover:text-gray-500 active:text-gray-600">
                                    <svg class="h-5 w-5" width="24" height="24" viewBox="0 0 24 24"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <!-- social - end -->
                    </div>
                </div>
                <!-- person - end -->

                <!-- person - start -->
                <div>
                    <div class="mb-2 h-48 overflow-hidden rounded-lg bg-gray-100 shadow-lg sm:mb-4 sm:h-60 md:h-80">
                        <img src="https://images.unsplash.com/photo-1529068755536-a5ade0dcb4e8?auto=format&q=75&fit=crop&w=500"
                            loading="lazy" alt="Photo by Midas Hofstra"
                            class="h-full w-full object-cover object-center" />
                    </div>

                    <div>
                        <div class="font-bold text-indigo-500 md:text-lg">Robert Greyson</div>
                        <p class="mb-3 text-sm text-gray-500 md:mb-4 md:text-base">Creative Director</p>

                        <!-- social - start -->
                        <div class="flex">
                            <div class="flex gap-4">
                                <a href="#" target="_blank"
                                    class="text-gray-400 transition duration-100 hover:text-gray-500 active:text-gray-600">
                                    <svg class="h-5 w-5" width="24" height="24" viewBox="0 0 24 24"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                    </svg>
                                </a>

                                <a href="#" target="_blank"
                                    class="text-gray-400 transition duration-100 hover:text-gray-500 active:text-gray-600">
                                    <svg class="h-5 w-5" width="24" height="24" viewBox="0 0 24 24"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <!-- social - end -->
                    </div>
                </div>
                <!-- person - end -->

                <!-- person - start -->
                <div>
                    <div class="mb-2 h-48 overflow-hidden rounded-lg bg-gray-100 shadow-lg sm:mb-4 sm:h-60 md:h-80">
                        <img src="https://images.unsplash.com/photo-1522529599102-193c0d76b5b6?auto=format&q=75&fit=crop&w=500"
                            loading="lazy" alt="Photo by Elizeu Dias" class="h-full w-full object-cover object-center" />
                    </div>

                    <div>
                        <div class="font-bold text-indigo-500 md:text-lg">John Roberts</div>
                        <p class="mb-3 text-sm text-gray-500 md:mb-4 md:text-base">Investor Relations</p>

                        <!-- social - start -->
                        <div class="flex">
                            <div class="flex gap-4">
                                <a href="#" target="_blank"
                                    class="text-gray-400 transition duration-100 hover:text-gray-500 active:text-gray-600">
                                    <svg class="h-5 w-5" width="24" height="24" viewBox="0 0 24 24"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                    </svg>
                                </a>

                                <a href="#" target="_blank"
                                    class="text-gray-400 transition duration-100 hover:text-gray-500 active:text-gray-600">
                                    <svg class="h-5 w-5" width="24" height="24" viewBox="0 0 24 24"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <!-- social - end -->
                    </div>
                </div>
                <!-- person - end -->

                <!-- person - start -->
                <div>
                    <div class="mb-2 h-48 overflow-hidden rounded-lg bg-gray-100 shadow-lg sm:mb-4 sm:h-60 md:h-80">
                        <img src="https://images.unsplash.com/photo-1488426862026-3ee34a7d66df?auto=format&q=75&fit=crop&w=500"
                            loading="lazy" alt="Photo by Matheus Ferrero"
                            class="h-full w-full object-cover object-center" />
                    </div>

                    <div>
                        <div class="font-bold text-indigo-500 md:text-lg">Judy Amandez</div>
                        <p class="mb-3 text-sm text-gray-500 md:mb-4 md:text-base">Senior Art Director</p>

                        <!-- social - start -->
                        <div class="flex">
                            <div class="flex gap-4">
                                <a href="#" target="_blank"
                                    class="text-gray-400 transition duration-100 hover:text-gray-500 active:text-gray-600">
                                    <svg class="h-5 w-5" width="24" height="24" viewBox="0 0 24 24"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                    </svg>
                                </a>

                                <a href="#" target="_blank"
                                    class="text-gray-400 transition duration-100 hover:text-gray-500 active:text-gray-600">
                                    <svg class="h-5 w-5" width="24" height="24" viewBox="0 0 24 24"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <!-- social - end -->
                    </div>
                </div>
                <!-- person - end -->
            </div>
        </div>
    </div>

@endsection
