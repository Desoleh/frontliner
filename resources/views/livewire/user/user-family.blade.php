<div>
            @if (session()->has('message'))
                <div class="w-full bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                    role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-xs">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif

        <div class="sm:flex w-full gap-2 mt-2">
            @if($updateMode)
                @include('livewire.user.user-family-update')
            @else
                @include('livewire.user.user-family-create')
            @endif

            <div class="w-2/3 ">
                <x-card title="Data Keluarga">
                    <div class="overflow-x-auto">
                        @if ($userfamilies)
                            <table class="border-collapse border border-gray-400 table-auto ">
                                <thead>
                                    <tr>
                                    <th class="border border-gray-300 text-xs">Nama</th>
                                    <th class="border border-gray-300 text-xs">NIK</th>
                                    <th class="border border-gray-300 text-xs">tempat Lahir</th>
                                    <th class="border border-gray-300 text-xs">Tgl Lahir</th>
                                    <th class="border border-gray-300 text-xs">Hubungan</th>
                                    <th class="border border-gray-300 text-xs">NPWP</th>
                                    <th class="border border-gray-300 text-xs">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($userfamilies as $item )
                                        <tr>
                                            <td class="border border-gray-300 text-xs px-2">{{ $item->nama }}</td>
                                            <td class="border border-gray-300 text-xs px-2">{{ $item->nik }}</td>
                                            <td class="border border-gray-300 text-xs px-2">{{ $item->birthday_place }}</td>
                                            <td class="border border-gray-300 text-xs px-2">{{ \Carbon\Carbon::parse($item->birthday)->isoFormat('DD/MM/YYYY') }}</td>
                                            <td class="border border-gray-300 text-xs px-2">{{ $item->hubungan }}</td>
                                            <td class="border border-gray-300 text-xs px-2">{{ $item->npwp }}</td>
                                            <td class="border border-gray-300 text-xs px-2">
                                                <button wire:click="edit({{$item->id}})" class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-indigo-100 bg-blue-700 rounded">Edit</button> |
                                                <button wire:click="destroy({{$item->id}})" class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-indigo-100 bg-red-700 rounded">Delete</button>
                                            </td>
                                        </tr>
                                    @empty
                                    <td colspan="6" class="border border-gray-300 text-xs">belum ada data keluarga</td>
                                    @endforelse
                                </tbody>
                            </table>
                        @endif
                    </div>
                </x-card>
            </div>
        </div>
</div>
