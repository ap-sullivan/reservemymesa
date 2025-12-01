<head>
    @include('layouts.head', ['title' => 'Home'])
    {{-- Alpine JS --}}
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="font-poppins antialiased bg-gray-100 dark:bg-gray-900">

    <!-- Navbar -->
    @include('layouts.navigation')

    <div x-data="reservationModal()" class="flex items-center justify-center mt-6">

        {{-- card --}}
        <div class="relative flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md max-w-2xl">
            <div class="relative h-56 overflow-hidden rounded-t-xl bg-blue-gray-500 bg-clip-border text-white">
                <img src="{{ asset(optional($restaurant->images->first())->path ?? 'default.jpg') }}"
                     alt="image of {{ $restaurant->name }}"
                     class="object-cover w-full h-full" />
            </div>

            <div class="p-6">
                <h5 class="text-xl font-semibold text-blue-gray-900 mb-1 ">
                    {{ $restaurant->name }}
                </h5>
                <p class="text-sm mb-2">
                    <span class="mr-2">{{ $restaurant->cuisine_type }}</span>&#x2022;
                    <span class="ml-2">{{ $restaurant->city }}</span>
                </p>

                <p class="text-sm font-light leading-relaxed">
                    {{ $restaurant->description }}
                </p>
            </div>

            {{-- form --}}
            <div class="p-6 pt-0">
             
                <form x-ref="resForm" 
                        method="POST" 
                        action="{{ route('reservations.store') }}"
>
                    @csrf

                    <input type="hidden" name="restaurant_id" value="{{ $restaurant->restaurant_id }}">


                    {{-- Date --}}
                    <h3 class="text-lg font-semibold mb-3">Select Date</h3>
                    <input
                        type="date"
                        name="reservation_date"
                        x-ref="date"
                        class="mb-6 p-2 border rounded-lg"
                        min="{{ now()->toDateString() }}"
                    />

                    {{-- Time --}}
                    <h3 class="text-lg font-semibold mb-3">Select Time</h3>
                    <div class="grid grid-cols-4 gap-3">
                        @php
                            $start = \Carbon\Carbon::createFromTime(12, 0); // 12:00
                            $end = \Carbon\Carbon::createFromTime(22, 0);   // 22:00
                        @endphp

                        @while ($start <= $end)
                            @php
                                $timeValue = $start->format('H:i');
                                $timeLabel = $start->format('g:i A');
                            @endphp

                            <button
                                type="button"
                                @click="selectTime('{{ $timeValue }}')"
                                :class="selectedTime === '{{ $timeValue }}'
                                        ? 'p-2 rounded-lg border text-center bg-pink-500 text-white border-pink-500'
                                        : 'p-2 rounded-lg border text-center border-gray-300 hover:bg-pink-500 hover:text-white transition'"
                            >
                                {{ $timeLabel }}
                            </button>

                            @php $start->addMinutes(30); @endphp
                        @endwhile
                    </div>

                    {{-- Hidden input to submit selected time --}}
                    <input type="hidden" name="reservation_time" id="reservation_time" x-ref="time">

                    {{-- Guests --}}
                    <h3 class="text-lg font-semibold mb-3 mt-6">Number of Guests</h3>
                    <select
                        name="pax_count"
                        id="pax_count"
                        x-ref="pax"
                        class="p-2 border rounded-lg w-40"
                    >
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}">
                                {{ $i }} Guest{{ $i > 1 ? 's' : '' }}
                            </option>
                        @endfor
                    </select>

                    {{-- Special requests --}}
                    <h3 class="text-lg font-semibold mb-3 mt-6">Special Requests</h3>
                    <textarea
                        name="requests"
                        id="requests"
                        rows="4"
                        x-ref="requests"
                        class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400"
                        placeholder="Let us know about any allergies, seating preference or if you're celebrating etc..."
                    ></textarea>

                    <button 
                    type="button"
    @click="openModal()"
    class="mt-6 w-full bg-pink-500 text-white p-3 rounded-lg font-semibold">
                        Continue
                    </button>
                </form>
            </div>
        </div>

        {{-- modal --}}
        <div
            x-show="open"
            x-cloak
            x-transition.opacity
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 bg-black/40 backdrop-blur-md"
        >
            <div class=" bg-white rounded-lg shadow-xl w-11/12 md:w-1/2  max-w-4xl p-6             
                ">
                <h2 class="text-xl font-bold mb-4">Confirm Reservation</h2>

                <div class="space-y-2 text-gray-700">
                    <p><strong>Date:</strong> <span x-text="summary.date"></span></p>
                    <p><strong>Time:</strong> <span x-text="summary.time"></span></p>
                    <p><strong>Guests:</strong> <span x-text="summary.pax"></span></p>
                    <p><strong>Requests:</strong> <span x-text="summary.requests"></span></p>
                </div>

                <div class="mt-6 flex justify-end gap-3">
                    <button
                        class="px-4 py-2 bg-gray-300 rounded"
                        @click="open = false"
                    >
                        Cancel
                    </button>

                    <button
                        class="px-4 py-2 bg-pink-500 text-white rounded"
                        @click="confirm()"
                    >
                        Confirm
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Alpine logic --}}
    <script>
        function reservationModal() {
    return {
        open: false,
        selectedTime: '',
        summary: {},

        selectTime(time) {
            this.selectedTime = time;
            this.$refs.time.value = time;
        },

        openModal() {
            const date = this.$refs.date.value;
            const time = this.$refs.time.value;
            const pax = this.$refs.pax.value;
            const requests = this.$refs.requests.value || "None";

            if (!date || !time) {
                alert("Please select both date and time before continuing.");
                return;
            }

            this.summary = { date, time, pax, requests };
            this.open = true;
        },

        confirm() {

            this.$refs.resForm.submit();

    //           console.log("DEBUG: Modal confirm clicked.");
    // console.log("Submitting form...", this.$refs.resForm);
    // console.log("Form action:", this.$refs.resForm.action);

    // const fd = new FormData(this.$refs.resForm);
    // for (const [key, value] of fd.entries()) {
    //     console.log("FIELD:", key, value);
    // }



    // alert("STOP — Debug mode: Form NOT submitted.");
    // return;
        }
    };
}
    </script>

    {{-- Optional: x-cloak helper (prevents flash of modal on page load) --}}
    <style>
        [x-cloak] { display: none !important; }
    </style>

</body>
