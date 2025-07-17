<div x-data="{ sidebarOpen: false }" class="flex min-h-screen bg-blue-50">

    {{-- Mobile Toggle Button --}}
    <div class="md:hidden fixed top-0 left-0 z-50 w-full bg-white border-b border-blue-200 shadow-sm flex items-center justify-between px-4 h-16">
        <a href="{{ route('dashboard') }}" class="text-xl font-bold text-blue-600 tracking-tight" style="font-family: 'Inter', sans-serif;">
            Booking System
        </a>
        <button @click="sidebarOpen = !sidebarOpen" class="text-blue-600 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>

    {{-- Sidebar --}}
    <aside :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}" class="fixed z-40 md:static inset-y-0 left-0 transform md:translate-x-0 transition-transform duration-200 ease-in-out w-64 bg-white border-r border-blue-200 shadow-lg flex flex-col">
        <div class="h-16 hidden md:flex items-center justify-center border-b border-blue-100">
            <a href="{{ route('dashboard') }}" class="text-2xl font-bold text-blue-600 tracking-tight" style="font-family: 'Inter', sans-serif;">
                Booking System
            </a>
        </div>

        <nav class="flex-1 p-4 space-y-1 mt-16 md:mt-0">
            <a href="{{ route('dashboard') }}" class="nav-link block{{ request()->routeIs('dashboard') ? ' active' : '' }}">🏠 Dashboard</a>
            <a href="{{ route('bookings.index') }}" class="nav-link block{{ request()->routeIs('bookings.index') ? ' active' : '' }}">📁 My Bookings</a>
            <a href="{{ route('bookings.create') }}" class="nav-link block{{ request()->routeIs('bookings.create') ? ' active' : '' }}">➕ New Booking</a>
            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-blue-700 hover:bg-blue-50" style="font-family: 'Inter', sans-serif;">Profile</a>
        </nav>

        {{-- User Dropdown --}}
        <div x-data="{ open: false }" class="relative px-4 py-3 border-t border-blue-100">
            <button @click="open = !open" class="w-full flex items-center justify-between text-left">
                <div class="flex items-center space-x-2">
                    <div class="w-9 h-9 rounded-full bg-blue-600 text-white flex items-center justify-center text-lg font-semibold">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <span class="text-blue-800 font-medium">{{ Auth::user()->name }}</span>
                </div>
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>

            <div x-show="open" @click.away="open = false"
                 class="mt-2 bg-white border border-blue-100 rounded-lg shadow-lg absolute left-4 right-4 z-10 py-1">
                <a href="{{ route('profile.edit') }}"
                   class="block px-4 py-2 text-sm text-blue-700 hover:bg-blue-50"
                   style="font-family: 'Inter', sans-serif;">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-blue-50"
                            style="font-family: 'Inter', sans-serif;">Logout</button>
                </form>
            </div>
        </div>
    </aside>

    {{-- Main Content --}}
    <main class="flex-1 p-6 md:ml-64 mt-16 md:mt-0">
        {{ $slot }}
    </main>
</div>

{{-- Alpine.js --}}
<script src="//unpkg.com/alpinejs" defer></script>

{{-- Styling --}}
<style>
    .nav-link {
        font-family: 'Inter', sans-serif;
        font-size: 1rem;
        color: #475569;
        padding: 0.75rem 1rem;
        border-radius: 0.375rem;
        transition: background 0.2s, color 0.2s;
    }

    .nav-link:hover,
    .nav-link.active {
        background-color: #e0f2fe;
        color: #1d4ed8;
        font-weight: 600;
    }
</style>
