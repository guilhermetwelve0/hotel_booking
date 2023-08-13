
@extends('layouts.main')

@section('title', 'Contact Us')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <header class="bg-gradient-to-b from-primary to-[#0001] py-20 text-white text-center">
        <div class="container mx-auto">
            <h1 class="text-4xl font-semibold mb-4">Contact Royal Crown Hotel</h1>
            <p class="text-lg text-secondary">Get in touch with us for inquiries or bookings.</p>
        </div>
    </header>

    <section class="py-16">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
                <div>
                    <h2 class="text-2xl font-semibold mb-4 text-secondary">Contact Information</h2>
                    <div class="text-gray-200">
                        <div class="mb-5">
                            <i class="fa-solid fa-hotel me-2"></i> Address: 123 Luxury Lane,<br> Yangon, Myanmar
                        </div>
                        <div class="mb-5">
                            <i class="fa-solid fa-phone-volume me-2"></i> Phone: (+95) 123-456-789<br>
                        </div>
                        <div class="mb-5">
                            <i class="fa-solid fa-envelope me-2"></i> Email: info@royalcrownhotel.com</p>
                        </div>
                    </div>
                </div>
                <div>
                    <h2 class="text-2xl font-semibold mb-4 text-secondary">Get In Touch</h2>
                    <form action="{{route('guest-info-add')}}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-300">Name</label>
                            <input type="text" id="name" name="name" placeholder="Full Name" class="mt-1 p-2 w-full border rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                            <input type="email" id="email" name="email" placeholder="Email Address" class="mt-1 p-2 w-full border rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-300">Phone</label>
                            <input type="tel" id="phone" name="phone" placeholder="Phone Number" class="mt-1 p-2 w-full border rounded-md">
                        </div>
                        <button type="submit" class="text-secondary border border-secondary px-4 py-2 rounded-md hover:bg-secondary hover:text-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
