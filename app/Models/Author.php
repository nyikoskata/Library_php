<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    //táblanév
    protected $table = "authors";

    //primaryKey
    protected $primaryKey = "authorId";

    //nem akarunk created meg updated mezőket kezelni
    public $timestamps = false;
}
