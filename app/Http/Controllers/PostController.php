<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Auth;
class PostController extends Controller
{
    public function add(){
        $find = Auth::user()->name;
        $data = Post::where('created_by', '=',$find)
                           ->get();
        return view('Blog.add',compact('data'));
    }

    public function insert(Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $save = new Post();
        $save->title = $request->title;
        $save->content = $request->content;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/images', $filename);
            $save->image = $filename;
        }
        $save->created_by = $request->created_by;
        $save->save();
        return back()->with('success','Post successfully Published');
    }

    public function edit(Request $request, $id){
        $save = Post::find($id);
        $save->title = $request->title;
        $save->content = $request->content;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/images', $filename);
            $save->image = $filename;
        }
        $save->created_by = $request->created_by;
        $save->save();
        return back()->with('success','Edited Successfully');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $data = Post::where('title', 'like', '%' . $searchTerm . '%')
                            ->get();

        return view('Blog.BlogListingPage', compact('data'));
    }
}
