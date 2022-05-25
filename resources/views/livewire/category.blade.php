<div>

    <div class="row">
      <div class="col-md-10" style="margin: 0 auto">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12 p-1" style="margin: 0 auto">
                        <x-jet-button wire:click="addCategory()" class="float-end">
                            {{ __('Add') }}
                        </x-jet-button>
                    </div>
                </div>
            </div>
          <div class="card-body">
            <table class="table text-center">
                <thead>
                    <th>Publish</th>
                    <th>Show Order</th>
                    <th>Arabic Name</th>
                    <th>English Name</th>
                    <th>Image</th>
                    <th>Option</th>
                </thead>
                @foreach ($categories as $row)
                    @if(!is_array($row))
                    <tr class="align-middle">
                        <td>{!! $row->is_active ? '<i class="fa fa-play text-success"></i>' : '<i class="fa fa-stop text-danger"></i>'!!}</td>
                        <td>{{$row->order}}</td>
                        <td>{{$row->arabic_cat}}</td>
                        <td>{{$row->english_cat}}</td>
                        <td class="pop">
                            <img src="{{asset('storage/'.$row->image)}}" alt="{{$row->arabic_cat}}" class="py-1 px-2" style="max-width: 100px; max-height: 100px; object-fit: contain">
                        </td>
                        <td>
                            <x-jet-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                        Options
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-jet-dropdown-link wire:click='toggleStatus({{$row->id}})'>
                                        {{ $row->is_active ? __('Unpublish') : __('Publish') }}
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link wire:click="editCategory({{$row->id}})">
                                        {{__('Edit')}}
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link  href="{{route('blog',$row->id)}}">
                                        {{__('Blogs')}}
                                    </x-jet-dropdown-link>
                                </x-slot>
                            </x-jet-dropdown>

                        </td>
                    </tr>
                    @endif
                @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>

    <x-jet-dialog-modal wire:model="CategoryModal">
        <x-slot name="title">
            @if($isEdit == true)
            {{ __('Edit Category') }}
            @else
            {{ __('Add Category')}}
            @endif
        </x-slot>
        <form>
            <x-slot name="content">
                <div class="relative z-0 mt-1  rounded-lg cursor-pointer">
                    <label for="arabicName">Arabic Name</label>
                    <input type="text" class="form-control" id="arabicField" wire:model="arabicName">
                    @error('arabicName') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="relative z-0 mt-1  rounded-lg cursor-pointer">
                    <label for="arabicDesc">Arabic Description</label>
                    <textarea name="arabicDesc" id="arabicDesc" cols="30" rows="3" class="form-control" wire:model="arabicDesc"></textarea>
                    @error('arabicDesc') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="relative z-0 mt-1  rounded-lg cursor-pointer">
                    <label for="englishField">English</label>
                    <input type="text" class="form-control" id="englishField" wire:model="englishName">
                    @error('englishName') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="relative z-0 mt-1  rounded-lg cursor-pointer">
                    <label for="englishDesc">English Description</label>
                    <textarea name="englishDesc" id="englishDesc" cols="30" rows="3" class="form-control" wire:model="englishDesc"></textarea>
                    @error('englishDesc') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="relative z-0 mt-1  rounded-lg cursor-pointer">
                    <label for="image">File</label>
                    <input type="file"  class="form-control" id="image">
                    @error('image') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="relative z-0 mt-1  rounded-lg cursor-pointer">
                    <label for="order">Order</label>
                    <input type="number"  class="form-control" min="0" id="order" wire:model="order">
                    @error('order') <span class="error">{{ $message }}</span> @enderror
                </div>
                <input type="hidden" name="categoryId" id="categoryId" wire:model='categoryId'>
                <input type="hidden" name="isEdit" id="isEdit" wire:model='isEdit'>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('CategoryModal')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-button class="ml-3" wire:loading.attr="disabled" wire:click="$emit('UploadData')">
                    {{ __('Save') }}
                </x-jet-button>
            </x-slot>
        </form>
    </x-jet-dialog-modal>

    <script>
        window.livewire.on('UploadData', () => {
            alert('in');
            let inputField = document.getElementById('image')
            let arabicField = document.getElementById('arabicField');
            let englishField = document.getElementById('englishField');
            let arabicDesc = document.getElementById('arabicDesc');
            let englishDesc = document.getElementById('englishDesc');
            let order = document.getElementById('order');
            let idField = document.getElementById('categoryId');
            let file = inputField.files[0]
            if(file)
            {
                let reader = new FileReader();
                reader.onloadend = () => {
                    window.livewire.emit('uploadData',  {image :reader.result ,
                                                        arabicName :arabicField.value ,
                                                        englishName :englishField.value ,
                                                        arabicDesc : arabicDesc.value,
                                                        englishDesc : englishDesc.value,
                                                        order :order.value ,
                                                        id : idField.value})
                }
                reader.readAsDataURL(file);
            }

            else
            {
                window.livewire.emit('uploadData',  {image :null ,
                                                        arabicName :arabicField.value ,
                                                        englishName :englishField.value ,
                                                        arabicDesc : arabicDesc.value,
                                                        englishDesc : englishDesc.value,
                                                        order :order.value ,
                                                        id : idField.value})
            }
        })
    </script>

</div>
