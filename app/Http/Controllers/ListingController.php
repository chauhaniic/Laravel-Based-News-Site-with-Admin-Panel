<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;

class ListingController extends Controller
{
    public function index(){
    	return view('front.listing');
    }

  public function listing($name){
  $id = Category::with('category')->where('name',$name)->pluck('id');
  $posts = Post::with(['comments','category','creator'])->where('status',1)->where('category_id',$id)->orderBy('id','DESC')->paginate(5);
  return view('front.listing',compact('posts'));
  }
  public function listing1($name){
    $id = User::where('username',$name)->pluck('id');
    $posts = Post::with(['comments','category','creator'])->where('status',1)->where('created_by',$id)->orderBy('id','DESC')->paginate(5);
    return view('front.listing',compact('posts'));
    }
}
