<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function showTags(){
        $tags = Tag::get()->first();
    }
}
