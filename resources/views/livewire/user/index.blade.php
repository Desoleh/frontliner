<x-app-layout>
    <x-slot name="header">
        {{ __('Biodata') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
            @if (session()->has('message'))
                <div class="w-full bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                    role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            @livewire('user.userview')
    </div>
</x-app-layout>
