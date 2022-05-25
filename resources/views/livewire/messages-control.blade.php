<div>
    <div class="row">
        <div class="col-md-10" style="margin: 0 auto">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Text</th>
                            <th>Option</th>
                        </thead>
                        @foreach ($messages as $row)
                        <tr class="align-middle">
                            <td>{{$row->customer_name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->subject}}</td>
                            <td>{{ Str::substr($row->text, 0, 80)}}</td>
                            <td>
                                <x-jet-button  wire:click='show({{$row->id}})' >
                                    {{__('show')}}
                                </x-jet-button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="showMessageModal">
        <x-slot name="title">
            {{ __('Message') }}
        </x-slot>
        <form>
            <x-slot name="content">
                <div class="row">
                    <div class="col-md-12">
                    <h5>Name : </h5>
                    <p>{{$customer_name}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h5>email : </h5>
                        <p>{{$email}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h5>subject</h5>
                        <p>{{$subject}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h5>Text</h5>
                        <p>{{$text}}</p>
                    </div>
                </div>

            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('showMessageModal')" wire:loading.attr="disabled">
                    {{ __('Close') }}
                </x-jet-secondary-button>
            </x-slot>
        </form>
    </x-jet-dialog-modal>
    <script>
        document.addEventListener('livewire:load', function () {
            $('table').DataTable();
        });
        window.addEventListener('datatable', (e) => {
            $('table').DataTable();
        } );
    </script>
</div>
