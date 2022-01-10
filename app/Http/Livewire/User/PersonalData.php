<?php

namespace App\Http\Livewire\User;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\RegRegency;
use App\Models\RegVillage;
use App\Models\RegDistrict;
use App\Models\RegProvince;
use Illuminate\Support\Facades\Auth;
use App\Models\PersonalData as ModelsPersonalData;
use App\Models\UserAddress;
use App\Models\UserFamily;
use App\Models\UserNpwp;
use WireUi\Traits\Actions;

class PersonalData extends Component
{
    use Actions;

    public $nama;
    public $birthday;
    public $status;
    public $npwp;
    public $provinces;
    public $province;
    public $regencies;
    public $regency;
    public $districts;
    public $villages;
    public $address;

    public $selectedProvince = NULL;
    public $selectedRegency = NULL;
    public $selectedDistrict = NULL;
    public $selectedVillage = NULL;

    public $updateMode = false;

    public function mount()
    {
        $this->provinces    = RegProvince::all();
        // ddd($this->provinces);
        $this->regencies    = collect();
        $this->villages     = collect();
        $this->regencies    = collect();

        $personal_data = ModelsPersonalData::where('nip',auth()->user()->nip)->first();
        $this->nik = $personal_data->nik;
        $this->name = $personal_data->name;
        $this->birthday = $personal_data->birthday;

        $this->districts = RegDistrict::where('regency_id', $personal_data->regencies)->get();
        $this->regencies = RegRegency::where('province_id', $personal_data->provinces)->get();
        $this->villages = RegVillage::where('district_id', $personal_data->districts)->get();

        // dd($this->userfamilies);
    }

    public function render()
    {
        $this->personal_data = ModelsPersonalData::where('nip',auth()->user()->nip)->first();
        // dd($this->personal_data);

        return view('livewire.user.personal-data');
    }

    public function updatedSelectedProvince($province)
    {
        if (!is_null($province)) {
            $this->regencies = RegRegency::where('province_id', $province)->get();
        }
    }

    public function updatedSelectedRegency($regency)
    {
        if (!is_null($regency)) {
            $this->districts = RegDistrict::where('regency_id', $regency)->get();
        }
    }

    public function updatedSelectedDistrict($district)
    {
        if (!is_null($district)) {
            $this->villages = RegVillage::where('district_id', $district)->get();
        }
    }

    public function submit()
    {
        // dd($this->all());
        $this->validate([
            'name'  => 'required',
            'birthday' => 'required',
            'nik' => 'required',
            'status'            =>  'required',
            'selectedProvince'         =>  'required',
            'selectedRegency'         =>  'required',
            'selectedDistrict'         =>  'required',
            'selectedVillage'          =>  'required',
            'address'           =>  'required',
        ],
        [
            'name.required'               =>  'Nama wajib diisi',
            'birthday.required'               =>  'Tanggal Lahir wajib diisi',
            'nik.required'               =>  'NIK wajib diisi',
            'status.required'               =>  'status wajib diisi',
            'selectedProvince.required'     =>  'Provinsi wajib diisi',
            'selectedRegency.required'      =>  'Kota/Kabupaten wajib diisi',
            'selectedDistrict.required'     =>  'Kecamatan wajib diisi',
            'selectedVillage.required'      =>  'Desa/Kelurahan wajib diisi',
            'address.required'              =>  'alamat wajib diisi',
        ]
        );

        ModelsPersonalData::updateOrCreate(['nip'=>Auth::user()->nip],[
            'name'              =>  $this->name,
            'birthday'          =>  $this->birthday,
            'status'            =>  $this->status,
        ]);

        UserNpwp::updateOrCreate(['nip'=>Auth::user()->nip],[
            'npwp'              =>  $this->npwp,
        ]);

        UserAddress::updateOrCreate(['nip'=>Auth::user()->nip],[
            'provinces'         =>  $this->selectedProvince,
            'regencies'         =>  $this->selectedRegency,
            'districts'         =>  $this->selectedDistrict,
            'villages'          =>  $this->selectedVillage,
            'address'           =>  $this->address,
        ]);

            session()->flash('message', 'Biodata berhasil dilengkapi.');
            return redirect()->to('/biodata');


    }
}
