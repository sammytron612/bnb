<div class="relative">
    <div x-show="guests;" class="absolute top-4 -left-16 border shadow-md w-1/4 p-2 rounded-lg bg-white w-96 hover:cursor-default">

        <div>
            <div class="flex justify-between p-4">
                <div>
                    <div class="font-bold">Adults</div>
                    <div class="text-gray-500 text-xs">Aged over 12</div>
                </div>
                <div class="flex items-center text-xl">
                    <button x-on:click="adults = adults > 0 ? adults-1 : adults--" class="mx-2 px-3 border rounded-full hover:bg-gray-200">-</button>
                    <div class="px-2" x-text="adults">0</div>
                    <button x-on:click="adults++" class="mx-2 px-3 border rounded-full hover:bg-gray-200">+</button>
                </div>
            </div>

            <div class="flex justify-between p-4">
                <div>
                    <div class="font-bold">Children</div>
                    <div class="text-gray-500 text-xs">Aged under 13</div>
                </div>
                <div class="flex items-center text-xl">
                    <button x-on:click="children = children > 0 ? children-1 : children--" class="mx-2 px-3 border rounded-full hover:bg-gray-200">-</button>
                    <div class="px-2" x-text="children">0</div>
                    <button x-on:click="children++" class="mx-2 px-3 border rounded-full hover:bg-gray-200">+</button>
                </div>
            </div>

            <div class="flex justify-between p-4">
                <div>
                    <div class="font-bold">Pets</div>
                    <div class="text-gray-500 text-xs underline">Bringing a service animal?</div>
                </div>
                <div class="flex items-center text-xl">
                    <button x-on:click="pets = pets > 0 ? pets-1 : pets--" class="mx-2 px-3 border border-gray-300 rounded-full hover:bg-gray-200">-</button>
                    <div class="px-2" x-text="pets">0</div>
                    <button x-on:click="pets++" class="mx-2 px-3 border rounded-full hover:bg-gray-200">+</button>
                </div>
            </div>
        </div>
    </div>
</div>
