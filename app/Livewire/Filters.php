<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class Filters extends Component
{
    public $categories;
    public $activeFilters = [];

    public function render()
    {
        return view('livewire.filters', [
            'articles' => Article::all()
        ]);
    }
}
