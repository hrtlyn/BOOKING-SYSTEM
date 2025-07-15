<x-app-layout>
    <div class="min-h-screen bg-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-blue-800 mb-2">Create New Booking</h1>
                        <p class="text-blue-600">Schedule your appointment with our calendar</p>
                    </div>
                    <a href="{{ route('bookings.index') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Bookings
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Booking Form -->
                <div class="bg-white border border-blue-200 rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-blue-800 mb-6">Booking Details</h2>
                    <form method="POST" action="{{ route('bookings.store') }}" class="space-y-6" id="bookingForm">
                        @csrf

                        <!-- Title -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-blue-800 mb-2">Booking Title</label>
                            <input type="text" id="title" name="title" value="{{ old('title') }}" class="w-full px-3 py-2 border border-blue-300 rounded focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter booking title" required>
                            @error('title')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Hidden Inputs -->
                        <input type="hidden" id="booking_date" name="booking_date" value="{{ old('booking_date') }}">
                        <input type="hidden" id="booking_time" name="booking_time" value="{{ old('booking_time') }}">

                        <!-- Time Picker Modal -->
                        <div id="timePickerModal" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50 hidden">
                            <div class="bg-white rounded-lg shadow p-6 w-full max-w-xs">
                                <h3 class="text-lg font-semibold mb-4 text-blue-800">Select a Time</h3>
                                <div class="grid grid-cols-2 gap-3 mb-4">
                                    @foreach(['09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00'] as $time)
                                        <button type="button" class="time-option px-4 py-2 rounded border border-blue-200 text-blue-800 hover:bg-blue-600 hover:text-white" data-time="{{ $time }}">
                                            {{ \Carbon\Carbon::createFromTimeString($time)->format('g:i A') }}
                                        </button>
                                    @endforeach
                                </div>
                                <button type="button" id="closeTimePicker" class="mt-2 w-full px-4 py-2 rounded bg-blue-100 hover:bg-blue-200 text-blue-800">Cancel</button>
                            </div>
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-blue-800 mb-2">Description</label>
                            <textarea id="description" name="description" rows="4" class="w-full px-3 py-2 border border-blue-300 rounded focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Tell us about your appointment needs...">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Buttons -->
                        <div class="flex items-center justify-between pt-4 gap-4 flex-wrap">
                            <button type="submit" name="action" value="save" class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 text-black font-semibold rounded hover:bg-blue-700 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Save
                            </button>

                            <a href="{{ route('bookings.index') }}" class="text-blue-600 hover:text-blue-800 text-sm">Cancel</a>
                        </div>
                    </form>
                </div>

                <!-- Calendar + Info -->
                <div class="space-y-6">
                    <!-- Calendar -->
                    <div class="bg-white border border-blue-200 rounded-lg p-6">
                        <h2 class="text-xl font-semibold text-blue-800 mb-6">Select Date</h2>
                        <div id="fullcalendar"></div>
                        <div id="selectedDateDisplay" class="mt-4 text-center text-blue-600 font-semibold"></div>
                    </div>

                    <!-- Booking Tips -->
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                        <div class="flex space-x-3">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-blue-800 mb-2">Booking Tips</h3>
                                <ul class="space-y-2 text-sm text-blue-700">
                                    <li class="flex items-center gap-2"><span class="w-2 h-2 bg-blue-600 rounded-full"></span> Select a date from the calendar</li>
                                    <li class="flex items-center gap-2"><span class="w-2 h-2 bg-blue-600 rounded-full"></span> Choose your time slot</li>
                                    <li class="flex items-center gap-2"><span class="w-2 h-2 bg-blue-600 rounded-full"></span> Provide appointment details</li>
                                    <li class="flex items-center gap-2"><span class="w-2 h-2 bg-blue-600 rounded-full"></span> Booked dates are marked in red</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Time Blocks -->
                    <div class="bg-white border border-blue-200 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-blue-800 mb-4">Available Times</h3>
                        <div class="grid grid-cols-3 gap-2">
                            <div class="text-center p-3 bg-blue-100 rounded">
                                <p class="text-sm font-medium text-blue-800">Morning</p>
                                <p class="text-xs text-blue-600">9:00 AM - 12:00 PM</p>
                            </div>
                            <div class="text-center p-3 bg-blue-50 rounded">
                                <p class="text-sm font-medium text-blue-800">Afternoon</p>
                                <p class="text-xs text-blue-600">1:00 PM - 4:00 PM</p>
                            </div>
                            <div class="text-center p-3 bg-blue-50 rounded">
                                <p class="text-sm font-medium text-blue-800">Evening</p>
                                <p class="text-xs text-blue-600">4:00 PM - 5:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS: FullCalendar logic -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let selectedDate = null;
            let selectedTime = null;
            let bookedDates = [];

            fetch('/api/booking-dates')
                .then(response => response.json())
                .then(data => {
                    bookedDates = (data.dates || data).map(d => d.date || d);
                    renderCalendar();
                }).catch(() => {
                    bookedDates = [];
                    renderCalendar();
                });

            function renderCalendar() {
                const calendarEl = document.getElementById('fullcalendar');
                calendarEl.innerHTML = '';
                const calendar = new FullCalendar.Calendar(calendarEl, {
                    plugins: [FullCalendar.dayGridPlugin, FullCalendar.interactionPlugin],
                    initialView: 'dayGridMonth',
                    selectable: true,
                    selectOverlap: false,
                    selectAllow: info => !bookedDates.includes(info.startStr),
                    dateClick: function (info) {
                        if (bookedDates.includes(info.dateStr)) return;
                        selectedDate = info.dateStr;
                        document.getElementById('booking_date').value = selectedDate;
                        document.getElementById('selectedDateDisplay').textContent = 'Selected: ' + new Date(selectedDate).toLocaleDateString();
                        document.getElementById('timePickerModal').classList.remove('hidden');
                    },
                    dayCellClassNames(arg) {
                        return bookedDates.includes(arg.date.toISOString().split('T')[0])
                            ? ['bg-red-100', 'text-red-600', 'cursor-not-allowed', 'font-semibold']
                            : [];
                    },
                });
                calendar.render();
            }

            document.querySelectorAll('.time-option').forEach(btn => {
                btn.addEventListener('click', function () {
                    selectedTime = this.dataset.time;
                    document.getElementById('booking_time').value = selectedTime;
                    document.getElementById('timePickerModal').classList.add('hidden');
                });
            });

            document.getElementById('closeTimePicker').addEventListener('click', () => {
                document.getElementById('timePickerModal').classList.add('hidden');
            });
        });
    </script>
</x-app-layout>
