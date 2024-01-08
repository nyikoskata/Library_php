<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    protected $table = "borrows";
    protected $primaryKey = "borrowId";

    public $timestamps = false;

    public function book(){
        return $this->belongsTo(Book::class, 'bookId');
    }

    public function student(){
        return $this->belongsTo(Student::class, 'studentId');
    }
}
