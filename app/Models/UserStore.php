<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStore extends Model
{
    use HasFactory;
    protected $table = 'product';



     /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('title', 'description', 'file');
}
