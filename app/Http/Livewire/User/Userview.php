<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\UserNpwp;
use App\Models\RegRegency;
use App\Models\RegVillage;
use App\Models\RegDistrict;
use App\Models\RegProvince;
use App\Models\UserAddress;
use App\Models\PersonalData;

class Userview extends Component
{
    public $personal_data;
    public $updateMode = false;
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

    public function mount()
    {
        $this->provinces    = RegProvince::all();
        // ddd($this->provinces);
        $this->regencies    = collect();
        $this->villages     = collect();
        $this->regencies    = collect();

        $personal_data = PersonalData::where('nip',auth()->user()->nip)->first();
        $this->nik = $personal_data->nik;
        $this->name = $personal_data->name;
        $this->birthday = $personal_data->birthday;
        $this->status = $personal_data->status;

        $user_address = UserAddress::where('nip',auth()->user()->nip)->first();

        $this->districts = RegDistrict::where('regency_id', $personal_data->regencies)->get();
        $this->regencies = RegRegency::where('province_id', $personal_data->provinces)->get();
        $this->villages = RegVillage::where('district_id', $personal_data->districts)->get();

        $this->address = $user_address->address;

        $this->selectedProvince = $user_address->provinces;
        $this->selectedRegency = $user_address->regencies;
        $this->selectedDistrict = $user_address->districts;
        $this->selectedVillage = $user_address->villages;

        $user_npwp = UserNpwp::where('nip',auth()->user()->nip)->first();
        $this->npwp = $user_npwp->npwp;
    }


    public function render()
    {
        $this->personal_data = PersonalData::where('nip',auth()->user()->nip)->first();
        return view('livewire.user.userview');
    }

    public function edit()
    {
        $this->updateMode = true;
    }
}
