<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\contanst_language;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Constant extends Component
{
    use WithFileUploads;

    public $editConstantModel = false;
    public $constantKey,$constantType,$constantValue,$constantID;
    protected $listeners = ['addConstant' , 'uploadFile'];
    public $constants;
    public $languageId = 1;
    public $constantFile;
    public $photo;
    public $image;
    public function mount()
    {
        $this->constants = contanst_language::where('language_id' , $this->languageId)->get();
    }

    public function uploadFile($imageData)
    {
        $this->image = $imageData;
        $fileName = $this->storeFile();
        $this->constantValue = $fileName;
        $this->update();
    }
    public function editConstant($id)
    {
        $this->editConstantModel = true;
        $constant =  contanst_language::find($id);
        $this->fill(['constantValue' =>$constant->value , 'constantType'=>$constant->type,'constantID'=>$constant->id]);
    }

    public function update()
    {
        $constant =  contanst_language::find($this->constantID);
        if($constant)
        {
            $constant->value = $this->constantValue;
            $constant->update();
        }
        $this->mount();
        $this->editConstantModel = false;
    }

    public function updateLanguage()
    {
        $this->mount();
    }
    public function render()
    {
        return view('livewire.constant');
    }

    public function storeImage()
    {
        if (!$this->image) {
            return null;
        }
        $img   = ImageManagerStatic::make($this->image)->encode('jpg');
        $name  = Str::random() . '.jpg';
        Storage::disk('public')->put($name, $img);
        return $name;
    }

    public function storeFile()
    {
        $image_64 = $this->image; //your base64 encoded data

        $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf

        $replace = substr($image_64, 0, strpos($image_64, ',')+1);

      // find substring fro replace here eg: data:image/png;base64,

       $image = str_replace($replace, '', $image_64);

       $image = str_replace(' ', '+', $image);

       $imageName = Str::random(10).'.'.$extension;

       Storage::disk('public')->put($imageName, base64_decode($image));
       return $imageName;
    }

    public function remove($commentId)
    {
        $comment = Comment::find($commentId);
        Storage::disk('public')->delete($comment->image);
        $comment->delete();
        session()->flash('message', 'Comment deleted successfully 😊');
    }
}
