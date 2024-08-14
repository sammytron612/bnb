<div class="w-4/5">

    <input style="text-align: center; width:100%" id="dates" x-model="dates" name="dates" type="text" :class="checkIn ? 'group-hover:bg-white bg-white' : 'w-100 group-hover:bg-gray-300 bg-gray-200'" class="text-xs  text-gray-800 focus:outline-none outline-none border-none focus:ring-0" :placeholder="dates">

        <script>
            flatpickr("#dates", {
            "minDate": new Date().fp_incr(1),
            enableTime: false,
            dateFormat: "d-m-Y",
            mode: 'range'
        });
        </script>
</div>
