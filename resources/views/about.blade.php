@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<div class="container mx-auto py-10">
    <!-- About Title -->
    <h1 class="text-4xl font-bold text-center mb-6">About Us</h1>

    <!-- Logo -->
    @if ($profile->logo)
        <div class="flex justify-center mb-6">
            <img src="{{ asset('storage/' . $profile->logo) }}" 
                 alt="{{ $profile->name }}" 
                 class="h-40 w-auto rounded-lg shadow-md">
        </div>
    @endif

    <!-- Profile Information -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h2 class="text-2xl font-semibold">{{ $profile->name }}</h2>
        <p class="text-gray-600 mt-2">{{ $profile->about }}</p>
    </div>

    <!-- Contact Information -->
    <div class="bg-gray-100 rounded-lg shadow-md p-6">
        <h3 class="text-xl font-bold mb-4">Contact Information</h3>
        <ul>
            <li><strong>Address:</strong> {{ $profile->address }}</li>
            <li><strong>Phone:</strong> {{ $profile->phone }}</li>
        </ul>
    </div>
</div>
@endsection
