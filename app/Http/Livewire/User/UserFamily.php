<?php

namespace App\Http\Livewire\User;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\UserFamily as ModelsUserFamily;

class UserFamily extends Component
{
    public $hubungan;
    public $nama;
    public $nik;
    public $birthday_place;
    public $birthday;
    public $npwp;
    public $day;
    public $month;
    public $year;
    public $userfamilies;
    public $updateMode = false;
    public $selected_id;

    public function render()
    {
        $this->userfamilies = ModelsUserFamily::where('nip',auth()->user()->nip)->get();
        return view('livewire.user.user-family');
    }

    public function submit()
    {
        // dd($this->all());
        $this->validate([
            'nama'            =>  'required',
            'nik'         =>  'required',
            'hubungan'         =>  'required',
            'birthday_place'         =>  'required',
            'day'          =>  'required',
            'month'          =>  'required',
            'year'          =>  'required',
        ],
        [
            'nama.required'               =>  'Nama wajib diisi',
            'nik.required'     =>  'NIK wajib diisi',
            'hubungan.required'      =>  'hubungan wajib diisi',
            'birthday_place.required'     =>  'Tempat Lahir wajib diisi',
            'day.required'      =>  'Tanggal wajib diisi',
            'month.required'      =>  'Bulan wajib diisi',
            'year.required'      =>  'Tahun wajib diisi',
        ]
        );

        ModelsUserFamily::create([
            'nip'               =>  auth()->user()->nip,
            'nik'               =>  $this->nik,
            'hubungan'          =>  $this->hubungan,
            'nama'              =>  $this->nama,
            'birthday_place'    =>  $this->birthday_place,
            'birthday'          =>  $this->year . '-' . $this->month . '-' . $this->day,
            'npwp'              =>  $this->npwp,
        ]);

        session()->flash('message', 'data' . $this->hubungan . 'berhasil disimpan');
        $this->reset();
    }

    public function edit($id)
    {

        $this->updateMode = true;

        $record = ModelsUserFamily::findOrFail($id);
        $this->selected_id = $id;
        $this->hubungan = $record->hubungan;
        $this->nama  = $record->nama;
        $this->nik  = $record->nik;
        $this->birthday_place  = $record->birthday_place;
        $this->npwp  = $record->npwp;
        $this->day  = Carbon::createFromFormat('Y-m-d', $record->birthday)->day;
        $this->month  = Carbon::createFromFormat('Y-m-d', $record->birthday)->month;
        $this->year  = Carbon::createFromFormat('Y-m-d', $record->birthday)->year;
        // dd($this->all());
    }

    public function update()
    {
        $this->validate([
            'nama'            =>  'required',
            'nik'         =>  'required',
            'hubungan'         =>  'required',
            'birthday_place'         =>  'required',
            'day'          =>  'required',
            'month'          =>  'required',
            'year'          =>  'required',
        ],
        [
            'nama.required'               =>  'Nama wajib diisi',
            'nik.required'     =>  'NIK wajib diisi',
            'hubungan.required'      =>  'hubungan wajib diisi',
            'birthday_place.required'     =>  'Tempat Lahir wajib diisi',
            'day.required'      =>  'Tanggal wajib diisi',
            'month.required'      =>  'Bulan wajib diisi',
            'year.required'      =>  'Tahun wajib diisi',
        ]
        );

       if ($this->selected_id) {
            $record = ModelsUserFamily::find($this->selected_id);
            $record->update([
                'nik'               =>  $this->nik,
                'hubungan'          =>  $this->hubungan,
                'nama'              =>  $this->nama,
                'birthday_place'    =>  $this->birthday_place,
                'birthday'          =>  $this->year . '-' . $this->month . '-' . $this->day,
                'npwp'              =>  $this->npwp,
            ]);

            session()->flash('message', 'data' . $this->hubungan . 'berhasil disimpan');
            $this->reset();
            $this->updateMode = false;
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = ModelsUserFamily::where('id', $id);
            $record->delete();
        }
    }
}
