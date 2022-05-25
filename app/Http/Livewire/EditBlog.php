<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\blog;
use App\Models\blog_details;
use App\Models\language;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
class EditBlog extends Component
{
    use WithFileUploads;

    public $title,$shortDescription , $description,$mainImage,$video;
    public $blog_id,$languageId = 1;
    public $keywords;
    public $savedImage , $savedVideo;
    public $languages;
    public $categoryId;

    protected $rules = [
        'title' => 'required|min:6',
    ];

    public function editBlog()
    {
        $blog = blog::findOrFail($this->blog_id);
        $this->savedImage = $blog->image;
        $this->savedVideo = $blog->video;
        $this->categoryId = $blog->category_id;
        $blog_details = blog_details::getByLanguage($this->blog_id , $this->languageId);
        $this->resetData();
        if($blog_details)
        {
            $this->title = $blog_details->title;
            $this->shortDescription = $blog_details->short_description;
            $this->description = $blog_details->description;
            $this->keywords = $blog_details->keywords;
        }
        $this->dispatchBrowserEvent('updateCkEditor', []);
    }

    public function resetData()
    {
        $this->reset(['title','description','shortDescription','mainImage','video']);
    }
    public function updateData()
    {
        $this->validate();
        if($this->blog_id)
        {
            $blog = blog::findOrFail($this->blog_id);
            $blog->updated_by = Auth::user()->id;
            if($this->mainImage){
                $blog->image = $this->mainImage->store('/public/blogs');
                $blog->image = str_replace('public/','',$blog->image);
            }
            if($this->video){
                $blog->video = $this->video->store('/public/blogs');
                $blog->video = str_replace('public/','',$blog->video);
            }
            $blog->save();

            $blog_details = blog_details::getByLanguage($this->blog_id , $this->languageId);
            if(!$blog_details)
            {
                $blog_details = new blog_details;
                $blog_details->blog_id = $blog->id;
                $blog_details->language_id = $this->languageId;
            }
            $blog_details->title = $this->title;
            $blog_details->description = $this->description;
            $blog_details->short_description = $this->shortDescription;
            $blog_details->keywords = $this->keywords;
            $blog_details->save();
            return redirect('/admin/blog'.($blog->category_id ? '/'.$blog->category_id : ''));

        }

    }

    public function mount()
    {
        $this->editBlog();
    }

    public function render()
    {
        $this->languages = language::all();
        return view('livewire.edit-blog');
    }
}
