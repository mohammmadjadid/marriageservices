<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\messages;

class MessagesControl extends Component
{

    public $messages;
    public $showMessageModal = false;
    public $customer_name,$email,$subject,$text;
    public function mount()
    {
        $this->messages = messages::orderBy('id','desc')->get();
    }

    public function show($id)
    {
        $message = messages::find($id);
        $this->text = $message->text;
        $this->email = $message->email;
        $this->customer_name = $message->customer_name;
        $this->subject = $message->subject;
        $this->showMessageModal = true;

    }
    public function render()
    {
        $this->dispatchBrowserEvent('datatable', []);
        return view('livewire.messages-control');
    }
}
