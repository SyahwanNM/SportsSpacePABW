@extends('layouts.sidebar')
@extends('layouts.header')
@extends('layouts.footer')

@section('content')
<div class="container mx-auto py-12">
    <h1 class="text-2xl font-bold mb-4">Edit Lapangan</h1>

    <form id="edit-lapangan-form" enctype="multipart/form-data" class="bg-white p-6 rounded shadow w-full max-w-xl" data-id="{{ request()->query('id_field') }}">
        @csrf

        <div class="mb-4">
            <label for="nama_lapangan" class="block font-medium mb-1">Nama Lapangan</label>
            <input type="text" id="nama_lapangan" name="nama_lapangan" class="w-full rounded px-4 py-2 border" required>
        </div>

        <div class="mb-4">
            <label for="lokasi" class="block font-medium mb-1">Lokasi</label>
            <input type="text" id="lokasi" name="lokasi" class="w-full rounded px-4 py-2 border" required>
        </div>

        <div class="mb-4">
            <label for="categori" class="block font-medium mb-1">Kategori</label>
            <input type="text" id="categori" name="categori" class="w-full rounded px-4 py-2 border">
        </div>

        <div class="mb-4">
            <label for="type" class="block font-medium mb-1">Jenis Olahraga</label>
            <input type="text" id="type" name="type" class="w-full rounded px-4 py-2 border" required>
        </div>

        <div class="mb-4">
            <label for="fasility" class="block font-medium mb-1">Fasilitas</label>
            <input type="text" id="fasility" name="fasility" class="w-full rounded px-4 py-2 border">
        </div>

        <div class="mb-4">
            <label for="opening_hours" class="block font-medium mb-1">Jam Buka</label>
            <input type="text" id="opening_hours" name="opening_hours" class="w-full rounded px-4 py-2 border">
        </div>

        <div class="mb-4">
            <label for="closing_hours" class="block font-medium mb-1">Jam Tutup</label>
            <input type="text" id="closing_hours" name="closing_hours" class="w-full rounded px-4 py-2 border">
        </div>

        <div class="mb-4">
            <label for="price" class="block font-medium mb-1">Harga</label>
            <input type="number" id="price" name="price" class="w-full rounded px-4 py-2 border" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block font-medium mb-1">Deskripsi</label>
            <textarea id="description" name="description" rows="4" class="w-full rounded px-4 py-2 border"></textarea>
        </div>

        <div class="mb-4">
            <label for="foto" class="block font-medium mb-1">Ganti Foto (opsional)</label>
            <input type="file" id="foto" name="foto" class="w-full rounded px-4 py-2 border">
        </div>

        <div id="foto-preview-container" class="mb-4"></div>

        <div class="flex justify-between">
            <button type="button" id="btn-back" class="text-gray-600 hover:underline">← Kembali</button>
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Simpan Perubahan</button>
        </div>
    </form>

    <div id="message" class="mt-4"></div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const token = localStorage.getItem('auth_token');
    if (!token) {
        alert('Silakan login terlebih dahulu');
        window.location.href = '/login';
        return;
    }

    const form = document.getElementById('edit-lapangan-form');
    const message = document.getElementById('message');
    const id = form.getAttribute('data-id');

    async function loadLapangan() {
        try {
            const res = await fetch(`{{ url('/api/lapangan') }}/${id}`, {
                headers: {
                    'Authorization': 'Bearer ' + token,
                    'Accept': 'application/json'
                }
            });

            if (!res.ok) throw new Error('Data tidak ditemukan');

            const data = await res.json();

            form.nama_lapangan.value = data.nama_lapangan || '';
            form.lokasi.value = data.lokasi || '';
            form.categori.value = data.categori || '';
            form.type.value = data.type || '';
            form.fasility.value = data.fasility || '';
            form.opening_hours.value = data.opening_hours || '';
            form.closing_hours.value = data.closing_hours || '';
            form.price.value = data.price || '';
            form.description.value = data.description || '';

            if (data.foto) {
                const preview = document.getElementById('foto-preview-container');
                preview.innerHTML = `<img src="/storage/${data.foto}" alt="Foto Lapangan" class="w-48 h-32 object-cover rounded border mb-2">`;
            }

        } catch (error) {
            alert('Error memuat data: ' + error.message);
            window.location.href = '/fields';
        }
    }

    form.addEventListener('submit', async e => {
        e.preventDefault();

        const formData = new FormData(form);

        try {
            const res = await fetch(`{{ url('/api/lapangan') }}/${id}`, {
                method: 'POST', // Laravel API menerima POST dengan _method PUT
                headers: {
                    'Authorization': 'Bearer ' + token,
                    'X-HTTP-Method-Override': 'PUT'
                },
                body: formData
            });

            if (!res.ok) {
                const errData = await res.json();
                throw new Error(errData.message || 'Gagal update data');
            }

            message.textContent = 'Data berhasil diperbarui.';
            message.className = 'text-green-600 mt-4';
            setTimeout(() => window.location.href = '/fields', 1500);
        } catch (error) {
            message.textContent = 'Error: ' + error.message;
            message.className = 'text-red-600 mt-4';
        }
    });

    document.getElementById('btn-back').addEventListener('click', () => {
        window.location.href = '/fields';
    });

    loadLapangan();
});
</script>
@endsection
