<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\categorys;
class Categorymng extends Component
{
    public $isEdit;
    public $categoryId;
    public $CategoryModal = false;
    public $categories;
    protected $listeners = [];

    public function addCategory()
    {
        $this->CategoryModal = true;
    }
    public function render()
    {
        $this->categories = categorys::with_language();
        return view('livewire.categorymng');
    }
}
