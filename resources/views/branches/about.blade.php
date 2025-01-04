@extends('layouts.branch')

@section('title', 'About ' . $branch->name)

@section('content')
<div class="container mx-auto py-10">
    <!-- Branch Logo and Name -->
    <div class="flex items-center mb-8">
        @if ($branch->logo)
            <img src="{{ asset('storage/' . $branch->logo) }}" class="h-20 w-20 rounded-full mr-4" alt="{{ $branch->name }}">
        @endif
        <h1 class="text-3xl font-bold">{{ $branch->name }}</h1>
    </div>

    <!-- About Section -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h2 class="text-2xl font-semibold mb-4">About Us</h2>
        <p class="text-gray-600">{!! $branch->about !!}</p>
    </div>    

    <!-- Contact Information -->
    <div class="bg-gray-100 rounded-lg shadow-md p-6">
        <h3 class="text-xl font-bold mb-4">Contact Information</h3>
        <ul>
            <li><strong>Phone:</strong> {{ $branch->phone }}</li>
            <li><strong>Address:</strong> {{ $branch->address }}</li>
        </ul>
    </div>
</div>
@endsection
