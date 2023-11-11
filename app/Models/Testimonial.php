<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable=['name','description','photo','status'];

    public static function getAllTestimonial(){
        return  Testimonial::orderBy('id','DESC')->paginate(10);
    }

}
