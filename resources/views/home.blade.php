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
                        Galeri {{ $profile->name }}
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

    <section class="text-gray-50 bg-black/50 body-font">
        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
            <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                <h1 class="title-font sm:text-6xl text-3xl mb-4 font-medium text-gray-50">Tim {{ $profile->name }}</h1>
                <p class="mb-8 leading-relaxed">Memperkenalkan pegawai yang kompeten, berdedikasi, dan berperan penting dalam mendukung kesuksesan.</p>
                <div class="flex justify-center">
                    <button
                        class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                        onclick="toggleTeamModal()"
                    >
                        Lihat Tim Kami
                    </button>
                </div>
            </div>
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                <img src="{{ asset('storage/' . $profile->banner2) }}" loading="lazy" alt="Photo by Manny Moreno"
                    class="h-full w-full object-cover object-center" />
            </div>
        </div>
    </section>
    
<!-- Modal -->
<div
    id="team-modal"
    class="fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center opacity-0 pointer-events-none transition-opacity duration-500"
>
    <div class="bg-white rounded-lg w-11/12 max-w-10xl overflow-y-auto shadow-xl transform scale-95 transition-transform duration-500">
        <div class="p-6">
            <div class="flex justify-between items-center border-b pb-4">
                <h2 class="text-2xl font-semibold text-gray-800">Tim Kami</h2>
                <button
                    class="text-gray-600 hover:text-red-500"
                    onclick="toggleTeamModal()"
                >
                    ✕
                </button>
            </div>
            <div class="mt-6">
                <div class="flex flex-wrap -m-2">
                    @foreach ($teamMembers as $member)
                        {{-- <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                            <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                                <img
                                    alt="team"
                                    class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                                    src="{{ asset('storage/' . $member->profile_picture) }}"
                                >
                                <div class="flex-grow">
                                    <h2 class="text-gray-900 title-font font-medium">{{ $member->name }}</h2>
                                    <p class="text-gray-500">{{ $member->title }}</p>
                                </div>
                            </div>
                        </div> --}}
                        <div class="p-4 lg:w-1/4 md:w-1/2">
                            <div class="h-full flex flex-col items-center text-center">
                                <img alt="team" class="w-48 h-48 bg-gray-100 object-cover object-center flex-shrink-0 rounded-md mr-4" src="{{ asset('storage/' . $member->profile_picture) }}"  >                              
                                <div class="w-full mt-2">
                                    <h2 class="title-font font-medium text-lg text-gray-900">{{ $member->name }}</h2>
                                    <h3 class="text-gray-500 mb-3">{{ $member->title }}</h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleTeamModal() {
        const modal = document.getElementById('team-modal');
        const isHidden = modal.classList.contains('opacity-0');

        if (isHidden) {
            modal.classList.remove('opacity-0', 'pointer-events-none'); // Show modal
            modal.classList.add('opacity-100', 'pointer-events-auto');
            setTimeout(() => {
                modal.classList.remove('scale-95'); // Scale-up animation
            }, 50);
        } else {
            modal.classList.add('scale-95'); // Scale-down animation
            setTimeout(() => {
                modal.classList.remove('opacity-100', 'pointer-events-auto'); // Hide modal
                modal.classList.add('opacity-0', 'pointer-events-none');
            }, 400);
        }
    }
</script>
    

@endsection
