<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Constants') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="row">
            @livewire('constant')
        </div>
    </div>
</x-app-layout>
