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

    protected $append = ['full_name'];
    public function getFullNameAttribute(){
        return $this->name.' '.$this->surname;
    }

    //1 -> n
    public function books(){
        //egy szerző több könyv -> hasMany(min keresztül kapcsolódik, idegenkulcs)
        //local key = primary key szval nem kell megadni
        return $this->hasMany(Book::class, 'authorId');
    }
}
