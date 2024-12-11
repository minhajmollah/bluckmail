<?php

namespace App\Imports;



use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;



class emailimport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
           
            'name'     => $row[1],
            'email'    => $row[2],
            'password' => Hash::make('password')
        ]);
    }
}
