<div>
    <div class="row">
      <div class="col-md-10" style="margin: 0 auto">
        <div class="card">
            <div class="card-header">
                <x-jet-button wire:click="addCategory()">
                    {{ __('Add') }}
                </x-jet-button>
            </div>
          <div class="card-body">
            <table class="table">
                <thead>
                    <th>Show Order</th>
                    <th>Arabic Name</th>
                    <th>English Name</th>
                    <th>Image</th>
                    <th>Option</th>
                </thead>
                @foreach ($categories as $row)
                <tr class="align-middle">
                    <td>{{$row->order}}</td>
                    <td>{{$row->arabic_cat}}</td>
                    <td>{{$row->english_cat}}</td>
                    <td>
                        <img src="{{asset('storage/'.$row->image)}}" alt="{{$row->arabic_cat}}" class="py-1 px-2" style="max-width: 250px; max-height: 250px; object-fit: contain">
                    </td>
                    <td>

                    </td>
                </tr>
                @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>

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
