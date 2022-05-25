<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\blog;
class BlogShow extends Component
{
    public $blogs;
    public $categoryId = null;
    public function toggleStatus($id)
    {
        $blog = blog::find($id);
        if($blog)
        {
            $blog->is_active = !$blog->is_active;
            $blog->save();
        }
    }
    public function render()
    {
        $this->blogs = blog::get_details($this->categoryId);
        return view('livewire.blog-show');
    }
}
