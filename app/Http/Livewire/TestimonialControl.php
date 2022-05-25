<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\testimonial;
use App\Models\testimonial_language;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class TestimonialControl extends Component
{

    use  WithFileUploads;
    public $username;
    public $text;
    public $position;
    public $image;
    public $rate;
    public $isEdit;
    public $testimonialId;
    public $TestimonialModal = false;
    public $error = '';
    public $testimonials;
    public $languageId = 1;
    protected $listeners = ['editTestimonial' , 'addTestimonial','uploadData'];


    public function editTestimonial($id)
    {
        $catData = testimonial::getByLanguage($id,$this->languageId);
        if($catData)
        {
            $this->fill([
            'testimonialId' => $catData->id,
            'username' => $catData->username,
            'position' => $catData->position,
            'text' => $catData->text,
            'rate' => $catData->rate,
            'image' => $catData->image,
            'isEdit' => true
            ]);
            $this->TestimonialModal = true;
            $this->testimonialId = $id;
            $this->isEdit = true;
        }
        else
        {
            session()->flash('error','There is no testimonial with this id');
        }
    }

    public function addTestimonial()
    {
        $this->TestimonialModal = true;
        $this->isEdit = false;
        $this->fill([
            'testimonialId' => null,
            'username' => null,
            'position' =>null,
            'text' => null,
            'rate' => null,
            'image' => null,
            'isEdit' => true
            ]);
        $this->dispatchBrowserEvent('updateCkEditor');
    }

    public function uploadData($req)
    {

        if($req['id'])
        {
            $this->update($req);
        }
        else{
            $this->store($req);
        }
        $this->getData();
        $this->TestimonialModal = false;
    }

    public function  store($req)
    {
        $data = new testimonial;
        $data->rate = $req['rate'];
        if($req['image']){
            $this->image = $req['image'];
            $data->image = $this->storeFile();
        }
        $data->save();
        $id = $data->id;
        $row = new testimonial_language;
        $row->language_id = 1;
        $row->username = $req['username'];
        $row->position = $req['position'];
        $row->text = $req['text'];
        $row->testimonial_id = $id;
        $row->save();
    }

    public  function update($req)
    {
        $data = testimonial::getByLanguage($req['id'],$req['languageId']);
        $testimonial = testimonial::find($req['id']);
        $testimonial->rate = $req['rate'];
        if($req['image']){
            $this->image = $req['image'];
            $testimonial->image = $this->storeFile();
        }
        $testimonial->save();

        $row = testimonial_language::where(['id'=>$data->id ,'language_id'=>$this->languageId])->first();
        if($row)
        {
            $row->username = $req['username'];
            $row->position = $req['position'];
            $row->text = $req['text'];
            $row->save();
        }
        else
        {
            $row = new testimonial_language;
            $row->username = $req['username'];
            $row->position = $req['position'];
            $row->text = $req['text'];
            $row->language_id = $this->languageId;
            $row->username = $req['username'];
            $row->position = $req['position'];
            $row->testimonial_id = $data->id;
            $row->save();
        }
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
    //     $this->reset(['arabicName','englishName','order','testimonialId','image']);
    // }

    public function toggleStatus($id)
    {
        $testimonial = testimonial::findOrFail($id);
        $testimonial->is_active = !$testimonial->is_active;
    }

    public function updateLanguage()
    {
        $this->editTestimonial($this->testimonialId);
    }
    public function getData()
    {

        $this->testimonials = testimonial::getAll();
    }
    public function render()
    {
        $this->getData();
        return view('livewire.testimonial-control');
    }
}
