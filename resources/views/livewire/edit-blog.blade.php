<div>

    <div class="row">
        <div class="col-md-10" style="margin: 0 auto">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent='updateData'>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="languageId">{{__('Language')}}</label>
                                <select name="languageId" class="form-control" id="languageId" wire:model='languageId'  wire:change='editBlog'>
                                    @foreach ( App\Models\language::all() as $lang )
                                        <option value="{{$lang->id}}">{{$lang->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <x-jet-label for="title" value="Title"></x-jet-label>
                                <x-jet-input type="text" id="title" class="form-control"  wire:model='title' >
                                </x-jet-input>
                                @error('title') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div wire:ignore class="col-md-12 my-4">
                                <x-jet-label for="description" value="ShorttDescription"></x-jet-label>
                                <textarea name="shortDescription" id="shortDescription" data-shortDescription="@this"  class="textEditor" wire:model='shortDescription'></textarea>
                                @error('shortDescription') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <hr>
                            <div wire:ignore class="col-md-12 my-4">
                                <x-jet-label for="description" value="Description"></x-jet-label>
                                <textarea name="description" id="description" class="textEditor" wire:model='description'></textarea>
                                @error('description') <span class="error">{{ $message }}</span> @enderror

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 my-4">
                                <x-jet-label for="keywords" value="Keywords"></x-jet-label>
                                <textarea name="keywords" id="keywords" cols="30" rows="3" class="form-control" wire:model='keywords'></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <x-jet-label for="mainImage" value="Main Image (820px * 500px)"></x-jet-label>
                                <x-jet-input type="file" id="mainImage"  wire:model='mainImage'></x-jet-input>
                                @if ($savedImage)
                                    <img src="{{asset('storage/'.$savedImage)}}" style="width: 250px; height:250px;" alt="">
                                @endif
                            </div>
                            <div class="col-md-6">
                                <x-jet-label for="video" value="Video"></x-jet-label>
                                <x-jet-input type="file" id="video" wire:model='video'></x-jet-input>
                                @if ($savedVideo)
                                    <img src="{{asset('storage/'.$savedVideo)}}" style="width: 250px; height:250px;" alt="">
                                @endif
                            </div>
                        </div>
                        <hr class="my-4">

                        <div class="row">
                            <div class="col-md-12 text-right">
                                <x-jet-button type="submit" value="Save">Save</x-jet-button>
                                <a href="{{route('blog',$categoryId)}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Cancel</a>
                                {{$categoryId}}
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
            CKEDITOR.replaceAll( 'textEditor' );
            CKEDITOR.instances.shortDescription.on('change',function(event){
                @this.set('shortDescription',event.editor.getData());
            })
            CKEDITOR.instances.description.on('change',function(event){
                @this.set('description',event.editor.getData());
            })
            window.addEventListener('updateCkEditor', (e) => {
                CKEDITOR.instances.shortDescription.setData($('#shortDescription').val());
                CKEDITOR.instances.description.setData($('#description').val());
            });
    </script>
</div>
