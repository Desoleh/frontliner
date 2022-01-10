<div>
    <form wire:submit.prevent="submit" method="POST">
        <div class="sm:flex w-full gap-2">
            <div class="w-full">
                <x-card title="Data Diri">
                    <x-input label="Nama" placeholder="Nama Lengkap" wire:model="name" />

                    <x-input label="NIK" placeholder="NIK" wire:model="nik" />

                    <x-datetime-picker
                        label="Tanggal Lahir"
                        placeholder="Tanggal Lahir"
                        display-format="DD-MM-YYYY"
                        wire:model.defer="birthday"
                        without-time
                    />

                    <x-inputs.maskable
                        label="Nomor NPWP"
                        mask="##.###.###.#-###.###"
                        placeholder="00.000.000.0-000.000"
                        wire:model.lazy="npwp"
                    />
                    <x-error name="npwp" />

                    <x-select
                        label="Status"
                        placeholder="Pilih status"
                        :options="['Kawin', 'Tidak Kawin']"
                        wire:model="status"
                    />

                </x-card>
            </div>
            <div class="w-full">
                <x-card title="Alamat tempat tinggal saat ini">
                    <x-textarea label="Alamat Lengkap" placeholder="alamat lengkap" wire:model.lazy="address" corner-hint="(contoh : Jl. Asia Afrika No. 14 Blok 12)" />

                    <x-select
                        label="Provinsi"
                        placeholder="Select one status"
                        wire:model="selectedProvince"
                    >
                        @foreach($provinces as $province)
                            <x-select.option label="{{ $province->name }}" value="{{$province->id}}" />
                        @endforeach
                    </x-select>

                    @if (!is_null($selectedProvince))
                        <x-select
                            label="Kota/Kabupaten"
                            placeholder="Pilih Kota/Kabupaten"
                            wire:model="selectedRegency"
                            required
                        >
                            @foreach($regencies as $regency)
                                <x-select.option label="{{ $regency->name }}" value="{{$regency->id}}" />
                            @endforeach
                        </x-select>
                    @endif

                    @if (!is_null($selectedRegency))
                        <x-select
                            label="Kecamatan"
                            placeholder="Pilih Kecamatan"
                            wire:model="selectedDistrict"
                        >
                            @foreach($districts as $district)
                                <x-select.option label="{{ $district->name }}" value="{{$district->id}}" />
                            @endforeach
                        </x-select>
                    @endif

                    @if (!is_null($selectedDistrict))
                        <x-select
                            label="Kelurahan/Desa"
                            placeholder="Pilih Kelurahan/Desa"
                            wire:model="selectedVillage"
                        >
                            @foreach($villages as $village)
                                <x-select.option label="{{ $village->name }}" value="{{$village->id}}" />
                            @endforeach
                        </x-select>
                    @endif


                </x-card>
            </div>
        </div>
        <div class="sm:flex w-full gap-2 mt-2 mb-2">
            <x-card>
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Simpan data pribadi
                        </button>
            </x-card>
        </div>
    </form>
    @if ($status === 'Tidak Kawin')
    @else
        @livewire('user.user-family')
    @endif
</div>
