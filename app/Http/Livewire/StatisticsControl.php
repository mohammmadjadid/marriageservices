<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\statistics;
use App\Models\statistics_language;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class StatisticsControl extends Component
{

    use  WithFileUploads;
    public $statisticKey;
    public $statisticValue;
    public $statisticIcon;
    public $image;
    public $isEdit;
    public $statisticId;
    public $statisticModal = false;
    public $error = '';
    public $statistics;
    public $languageId = 1;
    protected $listeners = ['editStatistic' , 'addStatistic','uploadData'];


    public function editStatistic($id)
    {
        $statisticData = statistics::getByLanguage($id,$this->languageId);
        if($statisticData)
        {
            $this->fill([
            'statisticId' => $statisticData->id,
            'statisticKey' => $statisticData->key,
            'statisticValue' => $statisticData->value,
            'statisticIcon' => $statisticData->icon,
            'image' => $statisticData->image,
            ]);
            $this->statisticModal = true;
            $this->statisticId = $id;
            $this->isEdit = true;
        }
        else
        {
            session()->flash('error','There is no statistic with this id');
        }
    }

    public function addStatistic()
    {
        $this->statisticModal = true;
        $this->isEdit = false;
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
        $this->statisticModal = false;
    }

    public function  store($req)
    {
        $data = new statistics;
        if($req['image']){
            $this->image = $req['image'];
            $data->image = $this->storeFile();
        }
        $data->icon = $req['statisticIcon'];
        $data->save();
        $id = $data->id;
        $row = new statistics_language;
        $row->language_id = 1;
        $row->key = $req['statisticKey'];
        $row->value = $req['statisticValue'];
        $row->statistic_id = $id;
        $row->save();
    }

    public  function update($req)
    {
        $data = statistics::getByLanguage($req['id'],$req['languageId']);
        $statistic = statistics::find($req['id']);
        if($req['image']){
            $this->image = $req['image'];
            $statistic->image = $this->storeFile();
        }
        $statistic->icon = $req['statisticIcon'];
        $statistic->save();

        $row = statistics_language::where(['statistic_id'=>$data->id ,'language_id'=>$this->languageId])->first();
        if($row)
        {
            $row->key = $req['statisticKey'];
            $row->value = $req['statisticValue'];
            $row->save();
        }
        else
        {
            $row = new statistics_language;
            $row->key = $req['statisticKey'];
            $row->value = $req['statisticValue'];
            $row->language_id = $this->languageId;
            $row->statistic_id = $data->id;
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
    //     $this->reset(['arabicName','englishName','order','statisticId','image']);
    // }

    public function toggleStatus($id)
    {
        $statistic = statistics::findOrFail($id);
        $statistic->is_active = !$statistic->is_active;
    }

    public function updateLanguage()
    {
        $this->editstatistic($this->statisticId);
    }
    public function getData()
    {

        $this->statistics = statistics::getAll();
    }
    public function render()
    {
        $this->getData();
        return view('livewire.statistics-control');
    }
}
