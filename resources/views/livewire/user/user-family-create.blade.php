                <div class="w-1/3">
                    <form wire:submit.prevent="submit" method="POST">
                            <x-card title="Data Keluarga">

                                <x-input label="Nama" placeholder="Nama" wire:model="nama" />
                                {{-- <x-error name="nama" /> --}}

                                <x-input label="NIK" placeholder="NIK" wire:model="nik" />
                                {{-- <x-error name="nik" /> --}}

                                <x-input label="Tempat Lahir" placeholder="kota/kabupaten" wire:model="birthday_place" />
                                {{-- <x-error name="birthday_place" /> --}}

                                <div class="flex flex-wrap items-end">
                                    <div class="mr-2">
                                        <x-select
                                            label="Tanggal Lahir"
                                            placeholder="Tanggal"
                                            :options="['1',	'2',	'3',	'4',	'5',	'6',	'7',	'8',	'9',	'10',	'11',	'12',	'13',	'14',	'15',	'16',	'17',	'18',	'19',	'20',	'21',	'22',	'23',	'24',	'25',	'26',	'27',	'28',	'29',	'30',	'31']"
                                            wire:model.defer="day"
                                        />
                                    </div>
                                    <div class="mr-2">
                                        <x-select
                                            label=""
                                            placeholder="Bulan"
                                            wire:model.defer="month"
                                        >
                                            <x-select.option label="Januari" value="1" />
                                            <x-select.option label="Februari" value="2" />
                                            <x-select.option label="Maret" value="3" />
                                            <x-select.option label="April" value="4" />
                                            <x-select.option label="Mei" value="5" />
                                            <x-select.option label="Juni" value="6" />
                                            <x-select.option label="Juli" value="7" />
                                            <x-select.option label="Agustus" value="8" />
                                            <x-select.option label="September" value="9" />
                                            <x-select.option label="Oktober" value="10" />
                                            <x-select.option label="November" value="11" />
                                            <x-select.option label="Desember" value="12" />
                                        </x-select>
                                    </div>
                                    <div class="mr-2">
                                            <x-select
                                            label=""
                                            placeholder="Tahun"
                                            :options="['1980',	'1981',	'1982',	'1983',	'1984',	'1985',	'1986',	'1987',	'1988',	'1989',	'1990',	'1991',	'1992',	'1993',	'1994',	'1995',	'1996',	'1997',	'1998',	'1999',	'2000',	'2001',	'2002',	'2003',	'2004',	'2005']"
                                            wire:model.defer="year"
                                        />
                                    </div>
                                </div>
                                <x-error name="birthday" />

                                <x-native-select
                                    label="Hubungan"
                                    placeholder="Pilih Hubungan"
                                    :options="['Suami', 'Istri', 'Anak']"
                                    wire:model="hubungan"
                                />
                                {{-- <x-error name="hubungan" /> --}}

                                <x-inputs.maskable
                                    label="Nomor NPWP"
                                    mask="##.###.###.#-###.###"
                                    placeholder="00.000.000.0-000.000"
                                    wire:model="npwp"
                                />
                                {{-- <x-error name="npwp" /> --}}
                            </x-card>
                            <x-card>
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Simpan data Keluarga
                                </button>
                            </x-card>
                    </form>
                </div>
