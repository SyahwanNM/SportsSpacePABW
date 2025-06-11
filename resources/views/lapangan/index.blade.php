@extends('layouts.app')

@section('content')
<div class="p-4 sm:ml-64 pt-20">
    <div class="p-4 border-2 border-gray-200 rounded-lg">
        <div class="mb-4">
            <h1 class="text-2xl font-bold text-gray-900">Sports Fields</h1>
        </div>

        <!-- Filter Section -->
        <div class="bg-white rounded-lg shadow-sm p-4 mb-4">
            <form action="{{ route('lapangan.index') }}" method="GET" class="flex flex-wrap gap-4">
                <div class="flex-1 min-w-[200px]">
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                    <select name="type" id="type" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                        <option value="">All Types</option>
                        <option value="Indoor" {{ request('type') == 'Indoor' ? 'selected' : '' }}>Indoor</option>
                        <option value="Outdoor" {{ request('type') == 'Outdoor' ? 'selected' : '' }}>Outdoor</option>
                    </select>
                </div>
                <div class="flex-1 min-w-[200px]">
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                    <select name="category" id="category" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                        <option value="">All Categories</option>
                        <option value="Futsal" {{ request('category') == 'Futsal' ? 'selected' : '' }}>Futsal</option>
                        <option value="Basket" {{ request('category') == 'Basket' ? 'selected' : '' }}>Basket</option>
                        <option value="Badminton" {{ request('category') == 'Badminton' ? 'selected' : '' }}>Badminton</option>
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 text-sm">
                        Filter
                    </button>
                </div>
            </form>
        </div>

        <!-- Fields Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
            @forelse($lapangan as $field)
            <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
                <div class="relative h-32">
                    <img src="{{ asset('storage/' . $field->foto) }}" alt="{{ $field->nama_lapangan }}" class="w-full h-full object-cover">
                    <div class="absolute top-2 right-2 bg-red-600 text-white px-2 py-1 rounded-full text-xs">
                        {{ $field->type }}
                    </div>
                </div>
                <div class="p-3">
                    <div class="flex justify-between items-start mb-1">
                        <h2 class="text-base font-semibold text-gray-900 truncate">{{ $field->nama_lapangan }}</h2>
                        <span class="bg-gray-100 text-gray-800 px-2 py-0.5 rounded-full text-xs ml-2 whitespace-nowrap">{{ $field->categori }}</span>
                    </div>
                    <p class="text-gray-600 text-xs mb-2 line-clamp-2">{{ $field->description }}</p>
                    <div class="flex items-center text-gray-600 text-xs mb-1">
                        <i class="ri-time-line mr-1"></i>
                        <span class="truncate">{{ $field->opening_hours }} - {{ $field->closing_hours }}</span>
                    </div>
                    <div class="flex items-center text-gray-600 text-xs mb-2">
                        <i class="ri-map-pin-line mr-1"></i>
                        <span class="line-clamp-1">{{ $field->address }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-base font-bold text-red-600">Rp {{ number_format($field->price, 0, ',', '.') }}</span>
                        <a href="{{ route('lapangan.show', $field) }}" class="bg-red-600 text-white px-2 py-1 rounded-lg hover:bg-red-700 text-xs">
                            Details
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-6">
                <p class="text-gray-500 text-sm">No fields found.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection 