<div>
<section class=" bg-gray-50">
    <header class=" bg-white shadow">
        <div class="flex items-center justify-between p-4 mx-auto max-w-7xl">
            <p>Data Pribadi</p>
        </div>
    </header>
        @if($updateMode)
            @livewire('user.personal-data-update')
        @else
            <main class="p-2 mx-auto max-w-7xl">
                <div class="flex flex-wrap">
                    <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                        <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                            <table class="min-w-full">
                            <tbody class="bg-white">
                                    <tr>
                                        <td class="px-6 py-2 bg-gray-100 border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-600">Nama Lengkap</div>
                                        </td>
                                        <td class="px-6 py-2 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm font-medium leading-5 text-gray-900">{{ $personal_data->name }}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-2 bg-gray-100 border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-600">NIP</div>
                                        </td>
                                        <td class="px-6 py-2 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm font-medium leading-5 text-gray-900">{{ $personal_data->nip }}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-2 bg-gray-100 border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-600">Tempat, Tgl Lahir</div>
                                        </td>
                                        <td class="px-6 py-2 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm font-medium leading-5 text-gray-900">{{ $personal_data->place_of_birth }}, {{ \Carbon\Carbon::parse($personal_data->birthday)->isoFormat('DD MMMM YYYY')}}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-2 bg-gray-100 border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-600">NIK</div>
                                        </td>
                                        <td class="px-6 py-2 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm font-medium leading-5 text-gray-900">{{ $personal_data->nik }}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-2 bg-gray-100 border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-600">Agama</div>
                                        </td>
                                        <td class="px-6 py-2 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm font-medium leading-5 text-gray-900">{{ $personal_data->religion }}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-2 bg-gray-100 border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-600">Status</div>
                                        </td>
                                        <td class="px-6 py-2 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm font-medium leading-5 text-gray-900">{{ $personal_data->status }}</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                        <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                            @livewire('user.user-address')
                        </div>
                    </div>
                </div>
                <div>
                    <x-card>
                        <button wire:click="edit({{$personal_data->nip}})" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Edit</button>
                    </x-card>
                </div>
            </main>
        @endif
</section>
@if ($personal_data->status === 'Kawin')
    <section class="min-h-screen bg-gray-50">
        <header class=" bg-white shadow">
            <div class="flex items-center justify-between p-4 mx-auto max-w-7xl">
                <p>Data Keluarga</p>
            </div>
        </header>
            <main class="p-4 mx-auto max-w-7xl">
                @livewire('user.user-family')
            </main>
    </section>
@endif

</div>
