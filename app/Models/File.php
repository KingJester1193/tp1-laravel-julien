<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable =   [
        'name',
        "name_fr",
        "path_file",
        "user_id"
    ];


    

    //sert a connecter user-id de file avec Table user pour avoir info
    public function fileHasUser(){
        return $this->hasOne('App\Models\User', "id", 'user_id');
    }
    
}
