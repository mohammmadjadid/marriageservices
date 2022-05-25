<div>

    <div class="row">
        <div class="col-md-10" style="margin: 0 auto">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12 p-1" style="margin: 0 auto">
                            <x-jet-button wire:click="addStatistic()" class="float-end">
                                {{ __('Add') }}
                            </x-jet-button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table text-center">
                        <thead>
                            <th>Image</th>
                            <th>Icon</th>
                            <th>Key</th>
                            <th>Value</th>
                            <th>Option</th>
                        </thead>
                        @foreach ($statistics as $row)
                        @if(!is_array($row))
                        <tr class="align-middle">
                            <td>{!!$row->image ? '<img src="'.asset('storage/'.$row->image).'"
                                    style="width : 100px; object-fit: contain">' :''!!}</td>
                            <td><i class="{{$row->icon}}"></i></td>
                            <td>{{$row->key}}</td>
                            <td>{{$row->value}}</td>
                            <td>
                                <x-jet-button wire:click="editStatistic({{$row->id}})">
                                    {{ __('Edit') }}
                                </x-jet-button>
                                <x-jet-button wire:click="toggleStatus({{$row->id}})">
                                    {{ $row->is_active ? __('Unpublish') : __('Publish') }}
                                </x-jet-button>

                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="statisticModal">
        <x-slot name="title">
            @if($isEdit == true)
            {{ __('Edit Statistic') }}
            @else
            {{ __('Add Statistic')}}
            @endif
        </x-slot>
        <form>
            <x-slot name="content">

                <div class="relative z-0 mt-1  rounded-lg cursor-pointer {{$isEdit ? '' : 'd-none'}}">
                    <label for="languageId">{{__('Language')}}</label>
                    <select name="languageId" id="languageId" class="form-control" wire:model='languageId'  wire:change='updateLanguage'>
                        @foreach ( App\Models\language::all() as $lang )
                            <option value="{{$lang->id}}">{{$lang->name}}</option>
                        @endforeach
                    </select>
                    @error('languageId') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="relative z-0 mt-1  rounded-lg cursor-pointer">
                    <label for="key">Name</label>
                    <input type="text" class="form-control" id="statisticKey" wire:model="statisticKey">
                    @error('statisticKey') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="relative z-0 mt-1  rounded-lg cursor-pointer">
                    <label for="value">Value</label>
                    <input type="text" class="form-control" id="statisticValue" wire:model="statisticValue">
                    @error('statisticValue') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="relative z-0 mt-1  rounded-lg cursor-pointer">
                    <label for="value">Icon</label>
                    <input type="text" class="form-control" id="statisticIcon" wire:model="statisticIcon">
                    @error('statisticIcon') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="relative z-0 mt-1  rounded-lg cursor-pointer">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image">
                    @error('image') <span class="error">{{ $message }}</span> @enderror
                </div>
                <input type="hidden" name="statisticId" id="statisticId" wire:model='statisticId'>
                <input type="hidden" name="isEdit" id="isEdit" wire:model='isEdit'>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('statisticModal')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-button class="ml-3" wire:loading.attr="disabled" wire:click="$emit('UploadData')">
                    {{ __('Save') }}
                </x-jet-button>
            </x-slot>
        </form>
    </x-jet-dialog-modal>

    <style>
        .height-100 {
            height: 100vh
        }

        .ratings {
            margin-right: 10px
        }

        .ratings i {
            color: #cecece;
            font-size: 32px
        }

        .rating-color {
            color: #fbc634 !important
        }

        .review-count {
            font-weight: 400;
            margin-bottom: 2px;
            font-size: 24px !important
        }

        .small-ratings i {
            color: #cecece
        }

        .review-stat {
            font-weight: 300;
            font-size: 18px;
            margin-bottom: 2px
        }
    </style>
    <script>
        window.livewire.on('UploadData', () => {
            alert('in');
            let inputField = document.getElementById('image')
            let statisticKey = document.getElementById('statisticKey');
            let statisticValue = document.getElementById('statisticValue');
            let statisticIcon = document.getElementById('statisticIcon');
            let idField = document.getElementById('statisticId');
            let languageId = document.getElementById('languageId');
            let file = inputField.files[0]
            console.log(file);
            if(file)
            {
                let reader = new FileReader();
                reader.onloadend = () => {
                    window.livewire.emit('uploadData',  {image :reader.result ,
                                                        statisticValue :statisticValue.value ,
                                                        statisticKey :statisticKey.value ,
                                                        statisticIcon :statisticIcon.value ,
                                                        id : idField.value,
                                                        languageId : languageId.value})
                }
                reader.readAsDataURL(file);
            }

            else
            {
                window.livewire.emit('uploadData',  {   image :null ,
                                                        statisticValue :statisticValue.value ,
                                                        statisticKey :statisticKey.value ,
                                                        statisticIcon :statisticIcon.value ,
                                                        id : idField.value,
                                                        languageId : languageId.value})
            }
        })

    </script>

</div>
