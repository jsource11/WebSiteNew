<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class BlogPostController extends Controller
{
    public function AllPost(){

        $blogs = BlogPost::latest()->get();
        return view('admin.blog_post.blog_post_all',compact('blogs'));
    }

    public function AddPost(){

        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('admin.blog_post.blog_post_add',compact('categories'));
    }


    public function StorePost(Request $request){

        ///dd($request);
        
        /*$request->validate([
            ''
        ]);*/

        $imgPost = $request->file('post_image');
        $imgName = hexdec(uniqid()).'.'.$imgPost->getClientOriginalExtension();
        $imgUrl = 'upload/post/'.$imgName;

        Image::make($imgPost)->resize(430,327)->save('upload/post/'.$imgUrl);
        

        BlogPost::insert([
            'category_id' => $request->post_category_id,
            'title' => $request->post_title,
            'tags' => $request->post_tags,
            'img' => $imgUrl,
            'description' => $request->post_description,
            'created_at' => Carbon::now(),
        ]);

        // Notificación de alerta para la vista
        $notifications = [
            'message'    => 'El post ha sido insertado correctamente',
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.blog_post.blog_post_all')->with($notifications);

    }
}
