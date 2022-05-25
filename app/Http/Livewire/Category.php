<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\categorys;
use App\Models\category_language;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class Category extends Component
{

    use  WithFileUploads;
    public $arabicName;
    public $englishName;
    public $arabicDesc;
    public $englishDesc;
    public $image;
    public $order;
    public $isEdit;
    public $categoryId;
    public $CategoryModal = false;
    public $error = '';
    public $categories;
    protected $listeners = ['editCategory' , 'addCategory','uploadData'];


    public function editCategory($id)
    {
        $catData = categorys::with_language($id);
        if($catData)
        {
            $this->fill([
            'categoryId' => $catData->id,
            'arabicName' => $catData->arabic_cat,
            'englishName' => $catData->english_cat,
            'englishDesc' => $catData->english_desc,
            'arabicDesc' => $catData->arabic_desc,
            'order' => $catData->order,
            'image' => $catData->image,
            ]);
            $this->CategoryModal = true;
        }
        else
        {
            session()->flash('error','There is no category with this id');
        }
    }

    public function addCategory()
    {
        $this->CategoryModal = true;
        $this->isEdit = false;
        $this->fill([
            'categoryId' => null,
            'arabicName' => null,
            'englishName' => null,
            'englishDesc' => null,
            'arabicDesc' => null,
            'order' => null,
            'image' => null,
            'isEdit' => false
        ]);
    }

    public function uploadData($req)
    {
        $this->validate([
            'arabicName' =>"required"
        ]);
        if($req['id'])
        {
            $this->update($req);
        }
        else{
            $this->store($req);
        }
        $this->getData();
        $this->CategoryModal = false;
    }

    public function  store($req)
    {
        $data = new categorys;
        $data->order = $req['order'];
        if($req['image']){
            $this->image = $req['image'];
            $data->image = $this->storeFile();
        }
        $data->save();
        $id = $data->id;
        $arabic = new category_language;
        $arabic->language_id = 1;
        $arabic->name = $req['arabicName'];
        $arabic->description = $req['arabicDesc'];
        $arabic->category_id = $id;
        $arabic->save();
        $english = new category_language;
        $english->language_id = 2;
        $english->name = $req['englishName'];
        $english->description = $req['englishDesc'];
        $english->category_id = $id;
        $english->save();
    }

    public  function update($req)
    {
        $data = categorys::with_language($req['id']);
        $category = categorys::find($req['id']);
        $category->order = $req['order'];
        if($req['image']){
            $this->image = $req['image'];
            $category->image = $this->storeFile();
        }
        $category->save();
        $arabic = category_language::where(['id'=>$data->arabicId ,'language_id'=>1])->first();
        $arabic->name = $req['arabicName'];
        $arabic->description = $req['arabicDesc'];
        $arabic->save();
        $english = category_language::where(['id'=>$data->englishId ,'language_id'=>2])->first();
        $english->name = $req['englishName'];
        $english->description = $req['englishDesc'];
        $english->save();
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

    // public function resetData()
    // {
    //     $this->reset(['arabicName','englishName','order','categoryId','image']);
    // }

    public function toggleStatus($id)
    {
        $category = categorys::findOrFail($id);
        $category->is_active = !$category->is_active;
        $category->update();
    }

    public function getData()
    {
        $this->categories = categorys::with_language();
    }
    public function render()
    {
        $this->getData();
        return view('livewire.category');
    }
}
