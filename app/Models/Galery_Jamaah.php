<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galery_Jamaah extends Model
{
    use HasFactory;
    protected $table = 'galery__jamaah';
    protected $fillable = [
        'title',
        'image',
        'deskripsi',
        'creator'
    ];

    // get Image
    public function getImage()
    {
        if (!$this->image) {
            return asset('image/logo_saja.png');
        }return asset('storage/image_jamaah/' . $this->image);
    }
}
