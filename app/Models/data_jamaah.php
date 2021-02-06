<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        'place_of_isssued_passpor',
        'issued_passpor',
        'expiried_passpor',
        'tanggal_keberangkatan',
        'status_pembayaran',
        'jenis_paket',
        'no_telp',
        'email'];
    // get foto avatar
    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('image/default.png');
        }return asset('image/' . $this->avatar);
    }
    // get foto ktp
    public function getKtp()
    {
        if (!$this->foto_ktp) {
            return asset('image/ktp_default.jpg');
        }return asset('image/' . $this->foto_ktp);
    }
    // get foto passport
    public function getPassport()
    {
        if (!$this->foto_passport) {
            return asset('image/passport_default.jpg');
        }return asset('image/' . $this->foto_passport);
    }
    // public function editData($id, $jamaah)
    // {
    //     DB::table('data_jamaah')->where('id', $id)->update($jamaah);
    // }
    public function editData($id, $data)
    {
        DB::table('data_jamaah')->where('id', $id)->update($data);
    }
}
