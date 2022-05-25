<div>

    <div class="row">
        <div class="col-md-10" style="margin: 0 auto">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12 p-1" style="margin: 0 auto">
                            <x-jet-button wire:click="addTestimonial()" class="float-end">
                                {{ __('Add') }}
                            </x-jet-button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table text-center">
                        <thead>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Rate</th>
                            <th>Text</th>
                            <th>Option</th>
                        </thead>
                        @foreach ($testimonials as $row)
                        @if(!is_array($row))
                        <tr class="align-middle">
                            <td>{!!$row->image ? '<img src="'.asset('storage/'.$row->image).'"
                                    style="width : 100px; object-fit: contain">' :''!!}</td>
                            <td>{{$row->username}}</td>
                            <td>{{$row->position}}</td>
                            <td>@for ($i = 0 ; $i < $row->rate;$i++)
                                <i class="fa fa-star rating-color"></i>
                                @endfor
                            </td>
                            <td>
                                {{Str::substr($row->text,0,60)}}
                            </td>
                            <td>
                                <x-jet-button wire:click="editTestimonial({{$row->id}})">
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

    <x-jet-dialog-modal wire:model="TestimonialModal">
        <x-slot name="title">
            @if($isEdit == true)
            {{ __('Edit Testimonial') }}
            @else
            {{ __('Add Testimonial')}}
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
                    <label for="username">Full Name</label>
                    <input type="text" class="form-control" id="username" wire:model="username">
                    @error('username') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="relative z-0 mt-1  rounded-lg cursor-pointer">
                    <label for="position">Position</label>
                    <input type="text" class="form-control" id="position" wire:model="position">
                    @error('position') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="relative z-0 mt-1  rounded-lg cursor-pointer">
                    <label for="text">Text</label>
                    <textarea name="text" id="text" class="textEditor form-control " cols="30" rows="3" wire:model="text"></textarea>
                </div>
                <div class="relative z-0 mt-1  rounded-lg cursor-pointer">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image">
                    @error('image') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="relative z-0 mt-1  rounded-lg cursor-pointer">
                    <label for="rate">Rate</label>
                    <input type="number" class="form-control" min="0" max="5" id="rate" wire:model="rate">
                    @error('rate') <span class="error">{{ $message }}</span> @enderror
                </div>
                <input type="hidden" name="testimonialId" id="testimonialId" wire:model='testimonialId'>
                <input type="hidden" name="isEdit" id="isEdit" wire:model='isEdit'>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('TestimonialModal')" wire:loading.attr="disabled">
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
            let username = document.getElementById('username');
            let text = document.getElementById('text');
            let position = document.getElementById('position');
            let rate = document.getElementById('rate');
            let idField = document.getElementById('testimonialId');
            let languageId = document.getElementById('languageId');
            let file = inputField.files[0]
            console.log(file);
            if(file)
            {
                let reader = new FileReader();
                reader.onloadend = () => {
                    window.livewire.emit('uploadData',  {image :reader.result ,
                                                        username :username.value ,
                                                        position :position.value ,
                                                        text :text.value ,
                                                        rate :rate.value ,
                                                        id : idField.value,
                                                        languageId : languageId.value})
                }
                reader.readAsDataURL(file);
            }

            else
            {
                window.livewire.emit('uploadData',  {   image :null ,
                                                        username :username.value ,
                                                        position :position.value ,
                                                        text :text.value ,
                                                        rate :rate.value ,
                                                        id : idField.value,
                                                        languageId : languageId.value})
            }
        })

    </script>

</div>
