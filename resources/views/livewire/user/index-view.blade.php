<x-app-layout>
    <x-slot name="header">
        {{ __('Biodata') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
            @livewire('user.userview')
    </div>
</x-app-layout>
