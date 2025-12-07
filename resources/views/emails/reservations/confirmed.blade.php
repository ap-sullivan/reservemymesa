<x-mail::message>

@php
    $formattedDate = \Carbon\Carbon::parse($reservation->reservation_date)->format('l, j F Y');
    $formattedTime = \Carbon\Carbon::parse($reservation->reservation_time)->format('g:i A');
@endphp

# Your Table Reservation is Confirmed

Thank you for your reservation at **{{ $reservation->restaurant->name }}**!

Here are your reservation details:

- **Date:** {{ $formattedDate }}
- **Time:** {{ $formattedTime }}
- **Guests:** {{ $reservation->pax_count }}
- **Special Requests:** {{ $reservation->requests ?? 'None' }}



<x-mail::button :url="url('/')">
Go to Mesa
</x-mail::button>

Thank you for using Mesa!!

</x-mail::message>
