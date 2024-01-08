<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = "students";
    protected $primaryKey = "studentId";

    public $timestamps = false;

    public function books(){
        return $this->belongsToMany(Book::class, 'borrows', 'studentId', 'bookId')
            ->withPivot('takenDate', 'broughtDate');
            // ->using(Borrow::class);
    }
}
