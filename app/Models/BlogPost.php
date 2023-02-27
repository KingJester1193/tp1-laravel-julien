<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BlogPost extends Model
{
    use HasFactory;
    protected $table = "blogs";

    protected $fillable = [
        'title',
        'title_fr',
        'blog',
        'blog_fr',
        'user_id',
      
    ];

    public function blogHasUser(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function selectLang(){

        $lang=session()->get('localeDB');

        $blogs = $this::select
        ('id', DB::raw("(case when title$lang is null then title else title$lang end) as title"), DB::raw("(case when blog$lang is null then blog else blog$lang end) as blog"), 'user_id','created_at')
                    ->orderBy('title')
                    ->get();


         return $blogs;

    }

    
    public function selectLangPost($id){

        $lang=session()->get('localeDB');

        $blog = $this::select
        ('id', DB::raw("(case when title$lang is null then title else title$lang end) as title"), DB::raw("(case when blog$lang is null then blog else blog$lang end) as blog"), 'user_id','created_at')
                    ->where('id',$id)

                    ->get();


         return $blog;

    }
  

   
}
