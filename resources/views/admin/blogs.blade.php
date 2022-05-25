<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $catId ?  __('Service Blog'): __('Blogs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="row">
            @livewire('blog-show',['categoryId'=>$catId])
        </div>
    </div>
</x-app-layout>
