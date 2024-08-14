<div>
    <div class="text-xs px-4 text-gray-800  text-left">Check Out</div>
    <input id="dateTo" type="hidden" :class="checkOut ? 'group-hover:bg-white bg-white' : 'group-hover:bg-gray-300 bg-gray-200'" class="text-xs px-4 text-gray-800 focus:outline-none outline-none border-none focus:ring-0" placeholder="Add date">

        <script>
                    flatpickr("#dateTo",{
            "minDate": new Date().fp_incr(1),
            "maxDate": new Date().fp_incr(7)
        });

        </script>
</div>
