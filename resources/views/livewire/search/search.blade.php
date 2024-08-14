<div>
    <input wire:model.live="searchTerm"  value="sunderland" type="text" id="simple-search" :class="where ? 'group-hover:bg-white bg-white' : 'group-hover:bg-gray-300 bg-gray-200'" class="group-hover:bg-gray-300 border-none  focus:bg-white p-0 focus-none outline-none border-transparent focus:border-transparent focus:ring-0 text-left" placeholder="Search..." required="">
    @isset($places)
    @if($results)
    <div class="relative">
        <div x-show="where" class="absolute top-4 border shadow-md w-1/4 p-2 rounded-lg bg-white w-96">
            @foreach($places->postalCodes as $place)
                <div class="flex w-full">
                    <div>
                        {{$place->placeName}}
                    </div>
                    <div class="ml-2">
                        @isset($place->adminName2)
                        {{$place->adminName2}}
                        @endisset
                    </div>
                    <div class="ml-2">
                        @isset($place->adminName1)
                        {{$place->adminName1}}
                        @endisset
                    </div>
                    <div class="ml-2">
                        @isset($place->countryCode)
                        {{$place->countryCode}}
                        @endisset
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    @endif
    @endisset
</div>
