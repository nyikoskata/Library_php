<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $table = "types";
    protected $primaryKey = "typeId";

    public $timestamps = false;

    //1 -> n
    public function books(){
        return $this->hasMany(Type::class, 'typeId');
    }
}
