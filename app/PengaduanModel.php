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
}
