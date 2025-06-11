@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Total Fields Card -->
        <div class="bg-red-50 rounded-lg p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-gray-600 text-sm">Total Fields</h2>
                    <p class="text-2xl font-bold text-red-600">{{ \App\Models\Lapangan::count() }}</p>
                </div>
                <div class="bg-red-100 p-3 rounded-full">
                    <i class="ri-football-line text-2xl text-red-600"></i>
                </div>
            </div>
        </div>

        <!-- Total Users Card -->
        <div class="bg-blue-50 rounded-lg p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-gray-600 text-sm">Total Users</h2>
                    <p class="text-2xl font-bold text-blue-600">{{ \App\Models\User::count() }}</p>
                </div>
                <div class="bg-blue-100 p-3 rounded-full">
                    <i class="ri-user-line text-2xl text-blue-600"></i>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white border rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-4">Quick Actions</h2>
            <div class="space-y-3">
                <a href="{{ route('admin.lapangan.create') }}" class="flex items-center text-gray-700 hover:text-red-600">
                    <i class="ri-add-line mr-2"></i>
                    Add New Field
                </a>
                <a href="{{ route('admin.lapangan.index') }}" class="flex items-center text-gray-700 hover:text-red-600">
                    <i class="ri-list-check mr-2"></i>
                    Manage Fields
                </a>
            </div>
        </div>
    </div>

    <!-- Chart Section -->
    <div class="mt-8">
        <h2 class="text-lg font-semibold mb-4">User Activity Chart</h2>
        <div class="bg-white border rounded-lg p-6">
            <canvas id="userActivityChart"></canvas>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('userActivityChart').getContext('2d');
    const userActivityChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'User Activity',
                data: [12, 19, 3, 5, 2, 3],
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endpush
@endsection 