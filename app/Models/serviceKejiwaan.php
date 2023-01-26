<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class serviceKejiwaan extends Model
{
    use HasFactory;

    public $table = 'service_kejiwaans';
    protected $guarded = ['id'];

    public function datapmks() {
        return $this->belongsTo(dataPmks::class, 'pmks_id', 'id');
    }
}
