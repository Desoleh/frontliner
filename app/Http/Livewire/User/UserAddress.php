<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\UserAddress as ModelsUserAddress;

class UserAddress extends Component
{

    public function render()
    {
        $this->useraddress = ModelsUserAddress::where('nip',auth()->user()->nip)
            ->join('reg_districts','user_addresses.districts', '=', 'reg_districts.id')
            ->join('reg_provinces','user_addresses.provinces', '=', 'reg_provinces.id')
            ->join('reg_regencies','user_addresses.regencies', '=', 'reg_regencies.id')
            ->join('reg_villages','user_addresses.villages', '=', 'reg_villages.id')
            ->select('user_addresses.*', 'reg_districts.name as districts_name',
                'reg_provinces.name as provinces_name', 'reg_regencies.name as regencies_name', 'reg_villages.name as villages_name')
        ->first();
        // dd($this->useraddress);
        return view('livewire.user.user-address');
    }

}
