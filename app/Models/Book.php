<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = "books";
    protected $primaryKey = "bookId";

    public $timestamps = false;

    //n -> 1
    public function author(){
        return $this->belongsTo(Author::class, 'authorId');
    }

    public function type(){
        return $this->belongsTo(Type::class, 'typeId');
    }

    //n -> n
    public function students(){
        return $this->belongsToMany(Student::class, 'borrows', 'bookId', 'studentId')
            ->withPoviot('takenDate', 'broughtDate');
            // ->using(Borrow::class);
    }
}
