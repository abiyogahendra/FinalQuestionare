<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Registration extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'nama' => 'required',
            'jenkel' => 'required|in:Laki - Laki,Perempuan',
            'umur' => 'required|numeric|min:17',
            'email' => 'required|email',
            'phone_number' => 'required|numeric',
            'pekerjaan' => 'required|in:Guru,Dosen,Mahasiswa,Tutor,Lainnya',
            'role' => 'required|in:Expert,Normal',
            'pengalaman' => 'required|in:1,2,3',
        ];
    }
    public function messages(){
        return [
            'nama.required' => 'Masukkan Nama',
            'jenkel.required' => 'Masukkan Jenis Kelamin',
            'jenkel.in:Laki - Laki,Perempuan' => 'Pilih Salah Satu',
            'umur.required' => 'Masukkan Umur',
            'umur.greater than:17' => 'Harus diatas 17 Tahun',
            'email.required' => 'Masukkan Email',
            'email.email' => 'Harus Berupa Email',
            'phone_number.required' => 'Masukkan No Telp',
            'phone_number.number' => 'Perhatikan Format Penulisan',
            'pekerjaan.required' => 'Masukkan Pekerjaan',
            'pekerjaan.in:Guru,Dosen,Mahasiswa,Tutor,Lainnya' => 'Pilih salah satu',
            'pengalaman.required' => 'Masukkan Pengalaman',
            'pengalaman.in:1,2,3' => 'Pilih Salah Satu',
            'role.required' => 'Masukkan Role',
            'role.in:Expert,Normal,Mahasiswa,Tutor,Lainnya' => 'Pilih salah satu',
        ];
    }
}
