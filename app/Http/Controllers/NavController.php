<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Posts;


class NavController extends Controller
{
    public function home(){
        $postsData = Posts::paginate(4);
        return view('post', compact('postsData'));
    }
    public function dashboard(){
        $postsData = DB::table('posts')->get();
        return view('dashboard', compact('postsData'));
    }
    public function profile(){
        return view('profile');
    }
}
