<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    //Define the table associated with the model
    protected $table = 'feedback';

    //Define the fields to asssign
    protected $fillable = ['name', 'email', 'message'];
}
