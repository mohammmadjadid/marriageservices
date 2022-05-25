<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\faq_language;
use App\Models\faq;

class FaqControle extends Component
{

    public $questionValue;
    public $answerValue;
    public $questions;
    public $editQuestionModel = false;
    public $languageId = 1;
    public $questionId;

    protected $listeners = ['addQuestion' , 'editQuestion','updateQuestion'];
    public function render()
    {
        $this->questions = faq_language::where('language_id' , $this->languageId)->get();

        return view('livewire.faq-controle');
    }

    public function addQuestion()
    {
        $this->editQuestionModel = true;
        $this->fill(['questionValue'=>null , 'answerValue'=>null,'questionId' => null]);
        $this->dispatchBrowserEvent('updateCkEditor', []);

    }

    public function editQuestion($id)
    {
        $this->editQuestionModel = true;
        $question = faq_language::where(['faq_id' => $id , 'language_id' => $this->languageId])->first();
        $this->fill([
            'questionId' => $id,
            'languageId' => $this->languageId,
            'questionValue' => $question->question,
            'answerValue' => $question->answer,
        ]);
        $this->dispatchBrowserEvent('updateCkEditor', []);


    }

    public function updateQuestion()
    {
        $question = faq_language::where(['faq_id' => $this->questionId , 'language_id' => $this->languageId])->first();
        if($question == null){
            $question = new faq_language;
        }
        $question->question = $this->questionValue;
        $question->answer = $this->answerValue;
        $question->save();
        $this->editQuestionModel = false;
    }

    public function createQuestion()
    {
        $faq = new faq;
        $faq->save();
        $question = new faq_language;
        $question->question = $this->questionValue;
        $question->answer = $this->answerValue;
        $question->faq_id = $faq->id;
        $question->language_id = $this->languageId;
        $question->save();
        $this->editQuestionModel = false;
    }
}
