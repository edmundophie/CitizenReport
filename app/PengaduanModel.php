<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PengaduanModel extends Model{
    protected $table = "pengaduan";

    public function getJudulAttribute($value)
    {
        return ucwords($value);
    }

    public function getCreatedAtAttribute($value)
    {
        return date('d M Y', strtotime($this->attributes['created_at']));
    }
}
