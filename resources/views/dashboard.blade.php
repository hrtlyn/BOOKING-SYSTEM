<x-app-layout>
    <div class="bg-gradient-to-tr from-blue-50 via-white to-blue-100 min-h-screen">
        {{-- Page Header --}}
        <div class="bg-white shadow-sm py-8 mb-8 border-b border-blue-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-3xl sm:text-4xl font-extrabold text-blue-800">Welcome to Your Dashboard</h1>
                <p class="text-blue-600 mt-2">Manage your bookings with ease and get quick system insights.</p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
            {{-- Flash Message --}}
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-800 px-5 py-4 rounded-md shadow-sm">
                    ✅ {{ session('success') }}
                </div>
            @endif

            {{-- Statistic Cards --}}
            <div class="space-y-4">
                @foreach([
                    ['label' => 'Total Bookings', 'value' => $totalBookings ?? 0, 'color' => 'sky', 'icon' => '📖'],
                    ['label' => 'Registered Users', 'value' => $totalUsers ?? 0, 'color' => 'teal', 'icon' => '👤'],
                    ['label' => 'Your Bookings', 'value' => $userBookings ?? 0, 'color' => 'indigo', 'icon' => '📌'],
                ] as $stat)
                    <div class="flex items-center bg-white rounded-xl shadow-md border-l-8 border-{{ $stat['color'] }}-400 px-6 py-4 hover:shadow-lg transition">
                        <div class="text-4xl mr-4">{{ $stat['icon'] }}</div>
                        <div>
                            <div class="text-2xl font-extrabold text-{{ $stat['color'] }}-600">{{ $stat['value'] }}</div>
                            <div class="text-sm uppercase tracking-wide text-gray-500 font-semibold">{{ $stat['label'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Recent Bookings --}}
            <div class="bg-white rounded-xl shadow p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-semibold text-blue-800">📋 Recent Bookings</h2>
                </div>

                @if($recentBookings->count())
                    <ul class="space-y-4">
                        @foreach($recentBookings as $booking)
                            <li class="flex items-center justify-between bg-blue-50 border-l-4 border-blue-400 px-6 py-4 rounded-lg shadow-sm hover:shadow-md transition">
                                <div>
                                    <h3 class="font-semibold text-blue-900 text-lg">{{ $booking->title }}</h3>
                                    <p class="text-sm text-blue-700 mt-1">
                                        📅 {{ \Carbon\Carbon::parse($booking->start_time)->format('M d, Y') }} | 🕒 
                                        {{ \Carbon\Carbon::parse($booking->start_time)->format('h:i A') }} - 
                                        {{ \Carbon\Carbon::parse($booking->end_time)->format('h:i A') }}
                                    </p>
                                    @if($booking->description)
                                        <p class="text-blue-800 text-sm mt-1">{{ $booking->description }}</p>
                                    @endif
                                </div>
                                <div class="flex gap-2">
                                    <a href="{{ route('bookings.edit', $booking) }}" class="bg-blue-600 text-black px-5 py-2 rounded-full shadow hover:bg-blue-700 transition">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('bookings.destroy', $booking) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="bg-red-500 text-white px-5 py-2 rounded-full shadow hover:bg-red-600 transition">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="text-center py-10">
                        <div class="w-16 h-16 rounded-full bg-blue-100 mx-auto flex items-center justify-center text-3xl mb-4">📅</div>
                        <h3 class="text-xl font-semibold text-blue-800 mb-2">No Bookings Yet</h3>
                        <p class="text-blue-600 mb-6 max-w-md mx-auto">Looks like you haven't created any bookings. Start by creating your first booking below!</p>
                        <a href="{{ route('bookings.create') }}" class="bg-blue-600 text-black px-6 py-3 rounded-lg shadow hover:bg-blue-700 transition inline-block">
                            + Create First Booking
                        </a>
                    </div>
                @endif
            </div>

            {{-- Action Buttons Box --}}
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ route('bookings.create') }}" class="w-full sm:w-auto text-center bg-blue-600 text-black px-10 py-3 rounded-xl font-semibold shadow hover:bg-blue-700 transition">
                        ➕ New Booking
                    </a>
                    <a href="{{ route('bookings.index') }}" class="w-full sm:w-auto text-center bg-blue-400 text-black px-10 py-3 rounded-xl font-semibold shadow hover:bg-blue-500 transition">
                        📁 View All Bookings
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
