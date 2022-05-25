<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blogs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="row">
            @livewire('add-blog',['categoryId'=>$catId])
        </div>
    </div>
</x-app-layout>
