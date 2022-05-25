<div>

    <div class="row">
        <div class="col-md-10" style="margin: 0 auto">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent='uploadData'>
                        <div class="row">
                            <div class="col-md-12">
                                <x-jet-label for="title" value="Title"></x-jet-label>
                                <x-jet-input type="text" id="title" class="form-control" required wire:model='title' >
                                </x-jet-input>
                                @error('title') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div wire:ignore class="col-md-12 my-4">
                                <x-jet-label for="description" value="ShorttDescription"></x-jet-label>
                                <textarea name="shortDescription" id="shortDescription" required data-shortDescription="@this"  class="textEditor" wire:model='shortDescription'></textarea>
                                @error('shortDescription') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <hr>
                            <div wire:ignore class="col-md-12 my-4">
                                <x-jet-label for="description" value="Description"></x-jet-label>
                                <textarea name="description" id="description" class="textEditor" required wire:model='description'></textarea>
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
                            </div>
                            <div class="col-md-6">
                                <x-jet-label for="video" value="Video"></x-jet-label>
                                <x-jet-input type="file" id="video" wire:model='video'></x-jet-input>
                            </div>
                        </div>
                        <hr class="my-4">

                        <div class="row">
                            <div class="col-md-12 text-right">
                                <x-jet-button type="submit" value="Save">Save</x-jet-button>
                                <x-jet-button type="button" value="Cancel" href="{{route('blog-add')}}">Cancel</x-jet-button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>

            $(function(){
                CKEDITOR.replaceAll( 'textEditor' );
                CKEDITOR.instances.shortDescription.on('change',function(event){
                    @this.set('shortDescription',event.editor.getData());
                })
                CKEDITOR.instances.description.on('change',function(event){
                    @this.set('description',event.editor.getData());
                })
            })
    </script>
</div>
