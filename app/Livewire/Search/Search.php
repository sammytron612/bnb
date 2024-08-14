<?php

namespace App\Livewire\Search;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\On;

class Search extends Component
{
    public $searchTerm = "";

    public $open = false;

    public $results = false;

    public function render()
    {

        if($this->searchTerm)
        {
            $response = Http::get('http://api.geonames.org/postalCodeSearchJSON?placename=' . $this->searchTerm . '&country=GB&maxRows=10&username=samtron612');

            $data = json_decode($response);
//dd(count($data->postalCodes));
            if(count($data->postalCodes) > 0){$this->results = true;} else {$this->results = false;}

            return view('livewire.search.search', ['places' => $data]);
        }


        return view('livewire.search.search');
    }

}
