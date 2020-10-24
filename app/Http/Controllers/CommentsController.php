<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class CommentsController extends Controller
{
    public function commentsSubmit(Request $req){
        $id= $req-> post_id;
        $req->validate([
            'name'=> 'required|max:100',
            'email'=> 'required|max:100',
            'comment'=> 'required|max:500',
        ]);
        DB::table('comments')->insert([
            'post_id'=> $req-> post_id,
            'name'=> $req-> name,
            'email'=> $req-> email,
            'comment'=> $req-> comment,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        return redirect()->back()->with('comments-done', 'Your comments has been done successfully...');
    }
}
