
@extends('layouts.main')

@section('title', 'About Us')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <header class="bg-gradient-to-b from-primary to-[#0001] py-20 text-white text-center">
        <div class="container mx-auto">
            <h1 class="text-4xl font-semibold mb-4">Welcome to Royal Crown Hotel</h1>
            <p class="text-lg text-secondary">Experience luxury like never before.</p>
        </div>
    </header>

    <section class="py-16">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
                <div class="space-y-4">
                    <h2 class="text-2xl font-semibold text-secondary">Our Story</h2>
                    <p class="text-gray-300">Discover the captivating journey that led to the creation of Royal Crown Hotel. With a commitment to elegance and comfort, we have crafted an oasis of luxury for our esteemed guests.</p>
                </div>
                <div class="space-y-4">
                    <h2 class="text-2xl font-semibold text-secondary">Our Mission</h2>
                    <p class="text-gray-300">At Royal Crown, our mission is to provide a memorable and exceptional experience to every guest. We strive to create an atmosphere of relaxation and indulgence, ensuring that your stay is nothing short of extraordinary.</p>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
