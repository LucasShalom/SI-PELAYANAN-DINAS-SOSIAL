<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataPmks extends Model
{
    use HasFactory;
    public $table = 'data_pmks';
    protected $guarded = ['id'];

    public function customer() {
        return $this->belongsTo(customer::class, 'customer_id', 'id');
    }
}
