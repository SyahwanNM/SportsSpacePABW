@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6 max-w-3xl">
    <a href="{{ route('fields.index') }}" class="text-gray-600 hover:underline mb-4 inline-block">← Kembali ke
        daftar</a>

    @if (!empty($field['image']))
    <div class="mb-6 w-full h-[200px] mx-auto overflow-hidden rounded shadow">
        <img src="{{ asset('storage/' . $field['image']) }}" alt="Foto Lapangan" class="w-full h-full object-cover" />
    </div>
    @endif

    <div class="bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-2">{{ $field['name'] }}</h1>
        <p class="text-gray-700 mb-1"><strong>Lokasi:</strong> {{ $field['location'] }}</p>
        <p class="text-gray-700 mb-1"><strong>Jenis Olahraga:</strong> {{ $field['sport_type'] }}</p>
        <p class="text-gray-700 mb-4"><strong>Harga:</strong> Rp{{ number_format($field['price'], 0, ',', '.') }}</p>

        <div>
            <h2 class="font-semibold text-lg mb-1">Deskripsi</h2>
            <p class="text-gray-600">{{ $field['description'] }}</p>
        </div>
    </div>
</div>
@endsection