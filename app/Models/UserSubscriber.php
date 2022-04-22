<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubscriber extends Model
{
    use HasFactory;

    protected $table='user_subscriber';
    protected $fillable=['email'];

}
