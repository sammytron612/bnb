<?php

namespace App\Livewire\Search;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Search extends Component
{
    public $query;


    public function render()
    {
        $response = Http::get('http://api.geonames.org/postalCodeSearchJSON?placename=sunderland&maxRows=10&username=samtron612');
        $posts = $response->json();
        dd($posts);
        return view('livewire.search.search');
    }
}
