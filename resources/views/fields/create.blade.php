@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Tambah Lapangan</h1>

    <form action="{{ route('fields.store') }}" method="POST" enctype="multipart/form-data"
        class="bg-white p-6 rounded shadow w-full max-w-xl">
        @csrf

        <div class="mb-4">
            <label class="block font-medium mb-1" for="name">Nama Lapangan</label>
            <input type="text" name="name" id="name" required
                class="w-full border-gray-300 rounded-lg px-4 py-2 focus:ring-red-500 focus:border-red-500">
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1" for="location">Lokasi</label>
            <input type="text" name="location" id="location" required
                class="w-full border-gray-300 rounded-lg px-4 py-2 focus:ring-red-500 focus:border-red-500">
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1" for="sport_type">Jenis Olahraga</label>
            <input type="text" name="sport_type" id="sport_type" required
                class="w-full border-gray-300 rounded-lg px-4 py-2 focus:ring-red-500 focus:border-red-500">
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1" for="description">Deskripsi</label>
            <textarea name="description" id="description" rows="4"
                class="w-full border-gray-300 rounded-lg px-4 py-2 focus:ring-red-500 focus:border-red-500"></textarea>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1" for="price">Harga (Rp)</label>
            <input type="number" name="price" id="price" required
                class="w-full border-gray-300 rounded-lg px-4 py-2 focus:ring-red-500 focus:border-red-500">
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1" for="image">Foto Lapangan (opsional)</label>
            <input type="file" name="image" id="image" class="w-full border-gray-300 rounded-lg px-4 py-2">
        </div>

        <div class="flex justify-between">
            <a href="{{ route('fields.index') }}" class="text-gray-600 hover:underline">← Kembali</a>
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Simpan</button>
        </div>
    </form>
</div>
@endsection