<div>
    <div class="row">
        <div class="col-md-10" style="margin: 0 auto">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12 p-1" style="margin: 0 auto">
                            <a href="{{route('blog-add',$categoryId)}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition float-end">{{__('Add')}}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="text-center">
                            <th>Active</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Created At</th>
                            <th>Created By</th>
                            <th>Optionn</th>
                        </thead>
                        @foreach ($blogs as $row)
                        <tr class="align-middle text-center">
                            <td>{!! $row->is_active ? '<i class="fa fa-play text-success"></i>' : '<i class="fa fa-stop text-danger"></i>'!!}</td>
                            <td>{{$row->title}}</td>
                            <td>{!!$row->short_description!!}</td>
                            <td>{{$row->created_by}}</td>
                            <td>{{$row->created_at}}</td>
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
                                        <x-jet-dropdown-link href="{{route('blog-edit',$row->id)}}">
                                            {{__('Edit')}}
                                        </x-jet-dropdown-link>
                                    </x-slot>
                                </x-jet-dropdown>

                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>
