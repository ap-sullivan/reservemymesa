@if ($upcomingReservations->count())
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Upcoming Reservations') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Here are your upcoming bookings.') }}
            </p>
        </header>

        <ul class="mt-6 space-y-4">
            @foreach ($upcomingReservations as $r)
                <li class="p-4 border rounded-lg bg-white shadow">
                    <p><strong>Restaurant:</strong> {{ $r->restaurant->name }}</p>
                    <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($r->reservation_date)->format('l j F Y') }}</p>
                    <p><strong>Time:</strong> {{ \Carbon\Carbon::parse($r->reservation_time)->format('g:i A') }}</p>
                    <p><strong>Guests:</strong> {{ $r->pax_count }}</p>
                    <form action="{{ route('reservations.destroy', $r->reservation_id) }}" method="POST"
                        onsubmit="return confirm('Cancel this reservation?');">
                        @csrf
                        @method('DELETE')

                        <button
                            class="mt-2 rounded-lg bg-pink-500 py-3 px-6 text-xs font-bold uppercase text-white shadow-md transition-all hover:shadow-lg">
                            Cancel Reservation
                        </button>
                    </form>

                </li>
            @endforeach
        </ul>
    </section>
@endif
