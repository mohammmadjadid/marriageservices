<div>
    <div class="row">
      <div class="col-md-10" style="margin: 0 auto">
        <div class="card">
          <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <label for="languageId">{{__('Language')}}</label>
                    <select name="languageId" id="languageId" wire:model='languageId'  wire:change='updateLanguage'>
                        @foreach ( App\Models\language::all() as $lang )
                            <option value="{{$lang->id}}">{{$lang->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <table class="table">
                <thead>
                    <th>Key</th>
                    <th>Value</th>
                    <th>Option</th>
                </thead>
                @foreach ($constants as $constant)
                <tr class="align-middle">
                    <td>{{$constant->key}}</td>
                    <td>
                        @if ($constant->type == 1 )
                            <p>{{$constant->value}}</p>
                        @else
                            @if($constant->value)
                                @if($constant->file_type == "image")
                                <img src="{{asset('storage/'.$constant->value)}}" alt="{{$constant->key}}" class="py-1 px-2" style="width: 150px; height: 150px; object-fit: cover">
                                @elseif ($constant->file_type == "video")
                                    <video width="320" height="240" controls>
                                        <source src="{{asset('storage/'.$constant->value)}}" type="video/mp4">
                                        <source src="{{asset('storage/'.$constant->value)}}" type="video/ogg">
                                        Your browser does not support the video tag.
                                      </video>
                                @else
                                    <a href="{{asset('storage/'.$constant->value)}}" download="true">Download</a>
                                @endif
                            @endif
                        @endif
                    </td>
                    <td>
                        <x-jet-button wire:click="editConstant({{$constant->id}})">
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

    <x-jet-dialog-modal wire:model="editConstantModel">
        <x-slot name="title">
            {{ __('Edit Constant') }}
        </x-slot>
        <form>
            <x-slot name="content">
                @if($constantType == 2)
                <div class="relative z-0 mt-1  rounded-lg cursor-pointer">
                    <label for="constantFile">File</label>
                    <input type="file" id="image">
                    @error('photo') <span class="error">{{ $message }}</span> @enderror
                </div>
                @else
                <div class="relative z-0 mt-1  rounded-lg cursor-pointer">
                    <label for="value">Text</label>
                    <input type="text" class="form-control" wire:model="constantValue">
                    @error('constantValue') <span class="error">{{ $message }}</span> @enderror
                </div>
                @endif
                <input type="hidden" name="constantType" wire:model='constantType'>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('editConstantModel')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                @if($constantType == 1 )
                <x-jet-button class="ml-3" type="submit" wire:loading.attr="disabled" wire:click='update'>
                    {{ __('Save') }}
                </x-jet-button>
                @else
                <x-jet-button class="ml-3" wire:loading.attr="disabled" wire:click="$emit('fileChoosen')">
                    {{ __('Save') }}
                </x-jet-button>
                @endif
            </x-slot>
        </form>
    </x-jet-dialog-modal>
</div>

<script>
    window.livewire.on('fileChoosen', () => {
        let inputField = document.getElementById('image')
        let file = inputField.files[0]
        let reader = new FileReader();
        reader.onloadend = () => {
            window.livewire.emit('uploadFile', reader.result)
        }
        reader.readAsDataURL(file);
    })
</script>
