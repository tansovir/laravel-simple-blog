<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Comments;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function addPost(Request $req){
        $req->validate([
            'title'=> 'required',
            'body'=> 'required',
        ]);
        DB::table('posts')->insert([
            'title'=> $req-> title,
            'body'=> $req-> body,
        ]);
        return back()->with('add-message','Your post has been added successfully...');
    }

    public function viewPostID($id){
        $viewPostID = DB::table('posts')->where('id',$id)->first();
        $comments = Comments::all()->where('post_id', $id);
        return view('viewPost', compact('viewPostID','comments'));
    }
    public function viewEditPostID($id){
        $viewEditPostID = DB::table('posts')->where('id',$id)->first();
        return view('updatePost', compact('viewEditPostID'));
    }

    public function deletePostID($id){
        DB::table('posts')->where('id', $id)->delete();
        Comments::where('post_id', $id)->delete();
        return back()->with('deleteMessage', 'Your post has been delete successfully...');
    }
    public function editPostID(Request $req, $id){
        DB::table('posts')->where('id', $id)->update([
            'title'=> $req->title, 
            'body'=> $req->body, 
        ]);
        return redirect()->to('/dashboard');
    }
    public function cancelUpdate(){
        return redirect()->to('dashboard');
    }
}
