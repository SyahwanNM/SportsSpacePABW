@extends('layouts.sidebar')
@extends('layouts.header')
@extends('layouts.footer')

<style>
    #logo-sidebar {
        width: 250px;
        transition: transform 0.3s ease-in-out;
    }
    @media (max-width: 768px) {
        #logo-sidebar {
            width: 200px;
        }
    }
</style>

@section('content')
<div class="container mx-auto py-12">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Daftar Lapangan</h1>
        <button id="btn-add" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
            + Tambah Lapangan
        </button>
    </div>

    <div id="lapangan-list" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <!-- Data dari API akan ditampilkan di sini -->
    </div>

    <div id="error-message" class="text-red-600 mt-4 hidden"></div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const token = localStorage.getItem('auth_token');
    if (!token) {
        document.getElementById('lapangan-list').innerHTML = '<p class="text-red-500">Silakan login terlebih dahulu.</p>';
        return;
    }

    const container = document.getElementById('lapangan-list');
    const errorMessage = document.getElementById('error-message');

    async function fetchFields() {
        errorMessage.classList.add('hidden');
        container.innerHTML = 'Loading...';

        try {
            const response = await fetch("{{ url('/api/lapangan') }}", {
                headers: {
                    'Authorization': 'Bearer ' + token,
                    'Accept': 'application/json'
                }
            });

            if (!response.ok) throw new Error('HTTP status ' + response.status);

            const data = await response.json();
            container.innerHTML = '';

            if (data.length === 0) {
                container.innerHTML = '<p>Tidak ada data lapangan.</p>';
                return;
            }

            data.forEach(field => {
                const card = document.createElement('div');
                card.className = 'bg-white p-4 rounded shadow';

                card.innerHTML = `
                    <h2 class="text-xl font-semibold">${field.nama_lapangan}</h2>
                    <p class="text-gray-600">${field.lokasi}</p>
                    <p class="text-gray-500 italic">${field.type || ''}</p>
                    <p class="text-sm text-gray-700 mt-2">${field.description || ''}</p>
                    <p class="mt-2 font-semibold">Rp${Number(field.price).toLocaleString('id-ID')}</p>
                    ${field.foto ? `<img src="/storage/${field.foto}" alt="Foto" class="w-full h-48 object-cover mt-2 rounded">` : ''}
                    <div class="mt-3 space-x-2">
                        <button data-id="${field.id}" class="btn-edit bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded shadow text-xs">Edit</button>
                        <button data-id="${field.id}" class="btn-delete bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded shadow text-xs">Hapus</button>
                    </div>
                `;

                container.appendChild(card);
            });

            // Event listeners untuk tombol edit & hapus
            document.querySelectorAll('.btn-edit').forEach(btn => {
                btn.addEventListener('click', () => {
                    const id = btn.getAttribute('data-id');
                    window.location.href = `{{ url('/fields/edit') }}?id_field=${id}`;
                });
            });

            document.querySelectorAll('.btn-delete').forEach(btn => {
                btn.addEventListener('click', async () => {
                    if (!confirm('Yakin ingin menghapus lapangan ini?')) return;
                    const id = btn.getAttribute('data-id');
                    try {
                        const res = await fetch(`{{ url('/api/lapangan') }}/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'Authorization': 'Bearer ' + token,
                            }
                        });
                        if (!res.ok) throw new Error('Gagal hapus data');
                        alert('Data berhasil dihapus');
                        fetchFields(); // refresh list
                    } catch (err) {
                        alert('Error saat menghapus: ' + err.message);
                    }
                });
            });

        } catch (error) {
            container.innerHTML = '';
            errorMessage.textContent = 'Gagal mengambil data lapangan: ' + error.message;
            errorMessage.classList.remove('hidden');
        }
    }

    fetchFields();

    // Tombol tambah bawa ke halaman create API
    document.getElementById('btn-add').addEventListener('click', () => {
        window.location.href = "{{ url('/fields/create') }}";
    });
});
</script>
@endsection
