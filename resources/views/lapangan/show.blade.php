@extends('layouts.app')

@section('content')
<main class="p-4 sm:ml-64 pt-20">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="bg-white p-4 rounded-lg shadow mb-4 flex items-center justify-between">
            <a href="{{ route('lapangan.index') }}" class="text-red-600 hover:text-red-700">
                <i class="ri-arrow-left-line text-xl"></i>
            </a>
            <h2 class="text-2xl font-bold text-red-700">{{ $lapangan->nama_lapangan }}</h2>
            <div class="w-6"></div> <!-- Spacer untuk balance -->
        </div>

        <!-- Image Carousel -->
        <div class="flex mb-4">
            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-64 overflow-hidden rounded-lg">
                    <div class="duration-700 ease-in-out" data-carousel-item="active">
                        <img src="{{ asset('storage/' . $lapangan->foto) }}" class="absolute block w-full h-full object-cover" alt="{{ $lapangan->nama_lapangan }}">
                    </div>
                </div>
                <!-- Slider controls -->
                <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                        <i class="ri-arrow-left-s-line text-white text-xl"></i>
                    </span>
                </button>
                <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                        <i class="ri-arrow-right-s-line text-white text-xl"></i>
                    </span>
                </button>
            </div>
        </div>

        <!-- Detail Field -->
        <div class="bg-white p-4 rounded-lg shadow mb-4">
            <!-- Rating and Category -->
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <i class="ri-star-fill text-yellow-400 text-xl mr-1"></i>
                    <p class="text-sm font-bold text-gray-900">4.95</p>
                    <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full"></span>
                    <a href="#reviews" class="text-sm font-medium text-gray-900 underline hover:no-underline">73 reviews</a>
                </div>
                <span class="bg-red-700 rounded-md px-3 py-1 text-white text-sm font-bold">{{ $lapangan->categori }}</span>
            </div>

            <!-- Price -->
            <div class="bg-red-700 rounded-md p-2 text-white text-sm font-bold w-1/3 mb-4">
                Rp {{ number_format($lapangan->price, 0, ',', '.') }}/HOUR
            </div>

            <!-- Description -->
            <div class="mb-4">
                <div class="flex items-center mb-2">
                    <i class="ri-information-line text-red-600 mr-2"></i>
                    <h2 class="font-semibold text-lg">Description</h2>
                </div>
                <p class="text-gray-600 text-sm text-justify">{{ $lapangan->description }}</p>
            </div>

            <!-- Facilities and Hours -->
            <div class="flex items-start space-x-8 mb-4">
                <!-- Facilities -->
                <div class="flex-1">
                    <div class="flex items-center mb-2">
                        <i class="ri-tools-line text-red-600 mr-2"></i>
                        <h2 class="font-semibold text-lg">Facilities</h2>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        @foreach(explode(',', $lapangan->fasility) as $facility)
                        <div class="flex items-center bg-gray-100 rounded-full px-3 py-1">
                            <i class="ri-checkbox-circle-fill text-green-500 mr-1"></i>
                            <span class="text-sm">{{ trim($facility) }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Operating Hours -->
                <div class="flex-1">
                    <div class="flex items-center mb-2">
                        <i class="ri-time-line text-red-600 mr-2"></i>
                        <h2 class="font-semibold text-lg">Operating Hours</h2>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <div class="flex items-center bg-gray-100 rounded-full px-3 py-1">
                            <i class="ri-sun-line text-yellow-500 mr-1"></i>
                            <span class="text-sm">Open: {{ $lapangan->opening_hours }}</span>
                        </div>
                        <div class="flex items-center bg-gray-100 rounded-full px-3 py-1">
                            <i class="ri-moon-line text-blue-500 mr-1"></i>
                            <span class="text-sm">Close: {{ $lapangan->closing_hours }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Location -->
            <div class="mb-4">
                <div class="flex items-center mb-2">
                    <i class="ri-map-pin-line text-red-600 mr-2"></i>
                    <h2 class="font-semibold text-lg">Location</h2>
                </div>
                <p class="text-gray-600 text-sm mb-2">{{ $lapangan->address }}</p>
                <div class="w-full h-64 rounded-lg overflow-hidden">
                    <iframe 
                        class="w-full h-full"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.348555666975!2d107.63460157317974!3d-6.968143468224553!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e9ba8f17fc29%3A0x7a6bd5f13e17fcde!2sFutsal%20Yogya%20Bojongsoang!5e0!3m2!1sid!2sid!4v1736135325771!5m2!1sid!2sid"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>

        <!-- Reviews Section -->
        <section class="bg-white p-4 rounded-lg shadow mb-4" id="reviews">
            <h2 class="text-xl font-bold mb-4">Reviews</h2>
            <!-- Sample Review -->
            <article class="mb-6 pb-6 border-b border-gray-200">
                <div class="flex items-center mb-4">
                    <img class="w-10 h-10 rounded-full" src="https://ui-avatars.com/api/?name=User&background=random" alt="User">
                    <div class="ml-4">
                        <p class="font-medium">User Name</p>
                        <p class="text-sm text-gray-500">Joined on October 2023</p>
                    </div>
                </div>
                <div class="flex items-center mb-2">
                    <div class="flex text-yellow-400">
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-fill"></i>
                        <i class="ri-star-half-fill"></i>
                    </div>
                    <span class="ml-2 text-sm font-semibold">Good Facilities</span>
                </div>
                <p class="text-sm text-gray-600 mb-2">Reviewed on March 3, 2024</p>
                <p class="text-gray-600 mb-2">Pencahayaan lapangan terang, sehingga saya dapat bermain dengan nyaman</p>
                <p class="text-gray-600 mb-3">Toilet bersih, ada kantin yang lengkap</p>
                <div class="flex items-center justify-between">
                    <p class="text-xs text-gray-500">19 people found this helpful</p>
                    <div class="flex items-center space-x-4">
                        <button class="px-3 py-1 text-sm border border-gray-200 rounded-lg hover:bg-gray-100">
                            Helpful
                        </button>
                        <button class="text-sm text-blue-600 hover:underline">
                            Report abuse
                        </button>
                    </div>
                </div>
            </article>
        </section>
    </div>
</main>

@push('scripts')
<script>
    // Initialize carousel
    const carousel = document.getElementById('default-carousel');
    if (carousel) {
        const items = carousel.querySelectorAll('[data-carousel-item]');
        let currentIndex = 0;

        function showSlide(index) {
            items.forEach((item, i) => {
                item.classList.toggle('hidden', i !== index);
            });
        }

        const prevButton = carousel.querySelector('[data-carousel-prev]');
        const nextButton = carousel.querySelector('[data-carousel-next]');

        prevButton?.addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + items.length) % items.length;
            showSlide(currentIndex);
        });

        nextButton?.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % items.length;
            showSlide(currentIndex);
        });
    }
</script>
@endpush
@endsection 