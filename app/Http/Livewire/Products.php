<?php

namespace App\Http\Livewire;

use App\Models\Products as ModelsProducts;


use Livewire\Component;

class Products extends Component
{
    public $products;
    public $searchWord = '';
    public $date = '';
    public $searchDate = false;
    public function render()
    {
        if($this->searchDate){
            $this->products = ModelsProducts::whereDate(
                'created_date','=', $this->date 
            )->get();
        }
        else{
            $this->products = ModelsProducts::where(
                'name', 'LIKE', '%' . $this->searchWord . '%'
            )->orWhere(
                'author_name', 'LIKE', '%' . $this->searchWord . '%'
            )->get();
        }
        
        return view('livewire.products');
    }

        public function resetSearch()
        {
            $this->searchDate = false;
            $this->date = '';

        }
   

    public function searchDate()
    {
        $this->searchDate = true;
    }
}
