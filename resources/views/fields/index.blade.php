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
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Daftar Lapangan</h1>
        <a href="{{ route('fields.create') }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
            + Tambah Lapangan
        </a>
    </div>

    @if(session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    @if(count($fields) > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($fields as $index => $field)
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-xl font-semibold">{{ $field['name'] }}</h2>
            <p class="text-gray-600">{{ $field['location'] }}</p>
            <p class="text-gray-500 italic">{{ $field['sport_type'] }}</p>
            <p class="text-sm text-gray-700 mt-2">{{ $field['description'] }}</p>
            <p class="mt-2 font-semibold">Rp{{ number_format($field['price'], 0, ',', '.') }}</p>
            <div class="flex gap-3 mt-4">
                <a href="{{ route('fields.show', $index) }}" class="text-blue-500 hover:underline">Lihat</a>
                <a href="{{ route('fields.edit', $index) }}" class="text-yellow-500 hover:underline">Edit</a>
                <form action="{{ route('fields.destroy', $index) }}" method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <p class="text-gray-600">Belum ada data lapangan.</p>
    @endif
</div>
@endsection