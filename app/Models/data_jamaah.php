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
    protected $fillable = ['grub', 'nama_ayah', 'nik', 'alamat', 'desa_kelurahan', 'kecamatan', 'kabupaten_kota', 'provinsi', 'sex', 'name', 'tempat_lahir', 'tanggal_lahir', 'passpor_no', 'place_of_issued_passpor', 'issued_passpor', 'expiried_passpor', 'tanggal_keberangkatan'];

    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('image/default.png');
        }return asset('image/' . $this->avatar);
    }
    public function editData($id, $jamaah)
    {
        DB::table('data_jamaah')->where('id', $id)->update($jamaah);
    }
}
