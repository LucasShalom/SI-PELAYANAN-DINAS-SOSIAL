<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;

    public $table = 'customers';
    protected $guarded = ['id'];

    public function admin() {
        return $this->belongsTo(staffAdministrasi::class, 'staffadministrasi_id', 'id');
    }

    public function datapmks() {
        return $this->hasMany(dataPmks::class);
    }
}
