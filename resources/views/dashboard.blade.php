<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        @if (isset(Auth::user()->personaldata->status))
            @livewire('user.userview')
        @else
            @livewire('user.personal-data')
        @endif
    </div>
</x-app-layout>
