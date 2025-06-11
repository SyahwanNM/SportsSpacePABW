<!-- Sidebar -->
<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('dashboard') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ request()->routeIs('dashboard') ? 'bg-gray-100' : '' }}">
                    <i class="ri-home-5-line text-xl text-gray-500 transition duration-75 group-hover:text-red-600"></i>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('komunitas.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ request()->routeIs('komunitas.*') ? 'bg-gray-100' : '' }}">
                    <i class="ri-group-line text-xl text-gray-500 transition duration-75 group-hover:text-red-600"></i>
                    <span class="ml-3">Komunitas</span>
                </a>
            </li>
            <li>
                <a href="{{ route('lapangans.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ request()->routeIs('lapangans.*') ? 'bg-gray-100' : '' }}">
                    <i class="ri-map-pin-line text-xl text-gray-500 transition duration-75 group-hover:text-red-600"></i>
                    <span class="ml-3">Lapangan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('profile') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ request()->routeIs('profile') ? 'bg-gray-100' : '' }}">
                    <i class="ri-user-line text-xl text-gray-500 transition duration-75 group-hover:text-red-600"></i>
                    <span class="ml-3">Profile</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
