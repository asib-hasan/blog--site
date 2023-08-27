<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Hash;
use Auth;
class AuthController extends Controller
{
    //Registration
    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->psw);

        $user->save();
        return back()->with('success','Registration successfully');
    }

    //Login
    public function login(){
        return view('login');
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }

    public function loginPost(Request $request){
        if(Auth::attempt(['email' => $request['email'], 'password' => $request['psw']])){
            return redirect('user/blogListingPage');
        }
        return back()->with('error','Please enter correct email or password');
    }

    public function BlogListingPage(){
        $data = Post::paginate(5);
        return view('Blog.BlogListingPage',compact('data'));
    }
}
