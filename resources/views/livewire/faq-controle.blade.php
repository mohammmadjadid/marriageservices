<div>
    <div class="row">
      <div class="col-md-10" style="margin: 0 auto">
        <div class="card">
          <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <label for="languageId">{{__('Language')}}</label>
                    <select name="languageId" id="languageId" wire:model='languageId'  wire:change='updateLanguage'>
                        @foreach ( App\Models\language::all() as $lang )
                            <option value="{{$lang->id}}">{{$lang->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 p-1" style="margin: 0 auto">
                    <x-jet-button wire:click="addQuestion()" class="float-end">
                        {{ __('Add') }}
                    </x-jet-button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Option</th>
                </thead>
                @foreach ($questions as $question)
                <tr class="align-middle">
                    <td>{{$question->question}}</td>
                    <td>
                        <p>{!! Str::substr($question->answer, 0, 120)!!}</p>
                    </td>
                    <td>
                        <x-jet-button wire:click="editQuestion({{$question->faq_id}})">
                            {{ __('Edit') }}
                        </x-jet-button>
                    </td>
                </tr>
                @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>

    <x-jet-dialog-modal wire:model="editQuestionModel">
        <x-slot name="title">
            @if($questionId)
            {{ __('Edit Question') }}
            @else
            {{ __('Add Question') }}
            @endif
        </x-slot>
        <form>
            <x-slot name="content">
                <div class="relative z-0 mt-1  rounded-lg cursor-pointer">
                    <label for="value">Question</label>
                    <input type="text" class="form-control" wire:model="questionValue">
                    @error('questionValue') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div wire:ignore class="relative z-0 mt-1  rounded-lg cursor-pointer">
                    <label for="answerValue">Answer</label>
                    <textarea name="answerValue" class="textEditor" id="answerValue" cols="30" rows="5" class="form-control" wire:model='answerValue'></textarea>
                    @error('answerValue') <span class="error">{{ $message }}</span> @enderror
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('editQuestionModel')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                @if($questionId)
                <x-jet-button class="ml-3" type="submit" wire:loading.attr="disabled" wire:click='updateQuestion'>
                    {{ __('Save') }}
                </x-jet-button>
                @else
                <x-jet-button class="ml-3" type="submit" wire:loading.attr="disabled" wire:click='createQuestion'>
                    {{ __('Save') }}
                </x-jet-button>
                @endif
            </x-slot>
        </form>
    </x-jet-dialog-modal>
</div>

<script>

CKEDITOR.replaceAll( 'textEditor' );
            CKEDITOR.instances.answerValue.on('change',function(event){
                @this.set('answerValue',event.editor.getData());
            })
            window.addEventListener('updateCkEditor', (e) => {
                console.log(CKEDITOR.instances.answerValue);
                CKEDITOR.instances.answerValue.setData($('#answerValue').val());
            });
</script>
