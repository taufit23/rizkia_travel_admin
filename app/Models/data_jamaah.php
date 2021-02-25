<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as FacadesDB;
use phpDocumentor\Reflection\Types\This;
use Illuminate\Support\Facedes\DB;

class data_jamaah extends Model
{
    use HasFactory;
    protected $table = 'data_jamaah';
    protected $fillable = [
        'grub',
        'nama_ayah',
        'nik',
        'alamat',
        'desa_kelurahan',
        'kecamatan',
        'kabupaten_kota',
        'provinsi',
        'sex',
        'name',
        'tempat_lahir',
        'tanggal_lahir',
        'passpor_no',
        'passpor_name',
        'place_of_isssued_passpor',
        'issued_passpor',
        'expiried_passpor',
        'tanggal_keberangkatan',
        'status_pembayaran',
        'jenis_paket',
        'no_telp',
        'email',
        'avatar',
        'foto_ktp',
        'foto_passport',
        'foto_kk',
        'foto_visa',
    ];
    // get foto avatar
    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('image/logo_saja.png');
        }return asset('storage/' . $this->avatar);
    }
    // get foto ktp
    public function getKtp()
    {
        if (!$this->foto_ktp) {
            return asset('image/ktp_default.jpg');
        }return asset('storage/' . $this->foto_ktp);
    }
    // get foto passport
    public function getPassport()
    {
        if (!$this->foto_passport) {
            return asset('image/passport_default.jpg');
        }return asset('storage/' . $this->foto_passport);
    }
    // get foto passport
    public function getkk()
    {
        if (!$this->foto_kk) {
            return asset('image/kk_default.jpg');
        }return asset('storage/' . $this->foto_kk);
    }

    // get foto passport
    public function getvisa()
    {
        if (!$this->foto_visa) {
            return asset('image/visa_default.jpg');
        }return asset('storage/' . $this->foto_visa);
    }

    public function getData_byDate($request)
    {
        $record = FacadesDB::table('data_jamaah')->select('*')->where('tanggal_keberangkatan' == $request->tanggal_keberangkatan)->get()->toArray();

        return $record;
    }
    

}
