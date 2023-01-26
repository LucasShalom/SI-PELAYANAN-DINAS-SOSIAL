<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staffAdministrasi extends Model
{
    use HasFactory;
    public $table = 'staffAdministrasis';
    protected $guarded = ['id'];

    public function customer() {
        return $this->hasMany(customer::class);
    }
}
