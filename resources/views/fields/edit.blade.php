@extends('layouts.sidebar')
@extends('layouts.header')
@extends('layouts.footer')

<style>
    #logo-sidebar {
    width: 250px; /* Sesuaikan dengan lebar sidebar yang diinginkan */
    transition: transform 0.3s ease-in-out;
}

@media (max-width: 768px) {
    #logo-sidebar {
        width: 200px; /* Sesuaikan ukuran sidebar di perangkat mobile */
    }
}
</style>

@section('content')
<div class="container mx-auto py-12">
    <h1 class="text-2xl font-bold mb-4">Edit Lapangan</h1>

    <form action="{{ route('fields.update', $index) }}" method="POST" enctype="multipart/form-data"
        class="bg-white p-6 rounded shadow w-full max-w-xl">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-medium mb-1" for="name">Nama Lapangan</label>
            <input type="text" name="name" id="name" value="{{ $field['name'] }}" required
                class="w-full rounded px-4 py-2 border">
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1" for="location">Lokasi</label>
            <input type="text" name="location" id="location" value="{{ $field['location'] }}" required
                class="w-full rounded px-4 py-2 border">
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1" for="sport_type">Jenis Olahraga</label>
            <input type="text" name="sport_type" id="sport_type" value="{{ $field['sport_type'] }}" required
                class="w-full rounded px-4 py-2 border">
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1" for="description">Deskripsi</label>
            <textarea name="description" id="description" rows="4"
                class="w-full rounded px-4 py-2 border">{{ $field['description'] }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1" for="price">Harga (Rp)</label>
            <input type="number" name="price" id="price" value="{{ $field['price'] }}" required
                class="w-full rounded px-4 py-2 border">
        </div>

        @if (!empty($field['image']))
        <div class="mb-4">
            <p class="font-medium mb-1">Foto Saat Ini:</p>
            <img src="{{ asset('storage/' . $field['image']) }}" alt="Foto Lapangan" class="w-full rounded mb-2">
        </div>
        @endif

        <div class="mb-4">
            <label class="block font-medium mb-1" for="image">Ganti Foto (opsional)</label>
            <input type="file" name="image" id="image" class="w-full border-gray-300 rounded-lg px-4 py-2">
        </div>


        <div class="flex justify-between">
            <a href="{{ route('fields.index') }}" class="text-gray-600 hover:underline">← Kembali</a>
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Simpan
                Perubahan</button>
        </div>
    </form>
</div>
@endsection