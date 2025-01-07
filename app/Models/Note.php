<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    // Specify the fillable properties to allow mass assignment
    protected $fillable = ['note', 'user_id'];

    // If the table name is not `notes`, specify it explicitly
    protected $table = 'notes';
}
