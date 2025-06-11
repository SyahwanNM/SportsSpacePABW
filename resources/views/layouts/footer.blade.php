<!-- resources/views/layouts/footer.blade.php -->

<footer class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 z-50">
    <div class="px-4 py-3 lg:px-6">
        <div class="flex items-center justify-between">
            <div class="text-sm text-gray-500">
                © 2024 Sports Space. All rights reserved.
            </div>
            <div class="flex space-x-4">
                <a href="#" class="text-gray-500 hover:text-red-600">
                    <i class="ri-facebook-fill"></i>
                </a>
                <a href="#" class="text-gray-500 hover:text-red-600">
                    <i class="ri-twitter-fill"></i>
                </a>
                <a href="#" class="text-gray-500 hover:text-red-600">
                    <i class="ri-instagram-fill"></i>
                </a>
            </div>
        </div>
    </div>
</footer>

<!-- Modal Logout -->
<div id="logout-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/50" tabindex="-1">
    <div class="bg-white rounded-lg shadow-lg w-80">
        <div class="flex justify-end p-2">
            <button data-modal-hide="logout-modal" class="text-gray-500 hover:text-gray-700">×</button>
        </div>
        <div class="p-6 text-center">
            <h3 class="mb-4 text-lg font-medium">
                Are you sure you want to log out?
            </h3>
            <button id="logoutConfirmBtn" data-modal-hide="logout-modal"
                class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 mr-2">
                Yes, log out
            </button>
            <button data-modal-hide="logout-modal"
                class="bg-gray-200 px-4 py-2 rounded-lg hover:bg-gray-300">
                No, cancel
            </button>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.querySelectorAll('[data-modal-toggle]').forEach(btn => {
        btn.addEventListener('click', () => {
            const id = btn.getAttribute('data-modal-toggle')
            document.getElementById(id).classList.toggle('hidden')
        })
    })

    document.querySelectorAll('[data-modal-hide]').forEach(btn => {
        btn.addEventListener('click', () => {
            const id = btn.getAttribute('data-modal-hide')
            document.getElementById(id).classList.add('hidden')
        })
    })

    document.getElementById('logoutConfirmBtn')?.addEventListener('click', async () => {
        const token = localStorage.getItem('auth_token')
        try {
            await fetch('/api/logout', {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Accept': 'application/json'
                }
            })
        } catch (e) {
            console.error('Logout gagal', e)
        }
        localStorage.removeItem('auth_token')
        window.location.href = "{{ route('login') }}"
    })
</script>
@endpush
