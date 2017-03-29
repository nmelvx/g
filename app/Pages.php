<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{

    protected $fillable = ['title', 'url', 'content', 'meta_title', 'meta_description'];


}
