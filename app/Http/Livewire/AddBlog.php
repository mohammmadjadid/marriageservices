<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\blog;
use App\Models\blog_details;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class AddBlog extends Component
{
    use WithFileUploads;


    public $title,$shortDescription , $description,$mainImage,$video;
    public $blog_id,$languageId = 1;
    public $keywords;
    public $savedImage , $savedVideo;
    public $categoryId = null;
    public function uploadData()
    {
        $blog = new blog;
        $blog->created_by = Auth::user()->id;
        $blog->category_id = $this->categoryId;
        if($this->mainImage){
            $blog->image = $this->mainImage->store('/public/blogs');
            $blog->image = str_replace('public/','',$blog->image);
        }
        if($this->video){
            $blog->video = $this->video->store('/public/blogs');
            $blog->video = str_replace('public/','',$blog->video);
        }
        $blog->save();
        $this->blog_id = $blog->id;

        $blog_details = new blog_details;
        $blog_details->title = $this->title;
        $blog_details->description = $this->description;
        $blog_details->short_description = $this->shortDescription;
        $blog_details->keywords = $this->keywords;
        $blog_details->blog_id = $this->blog_id;
        $blog_details->language_id = 1;
        $blog_details->save();

        return redirect('/admin/blog'.($this->categoryId ? '/'.$this->categoryId : '' ));
    }


    public function render()
    {
        return view('livewire.add-blog');
    }
}
