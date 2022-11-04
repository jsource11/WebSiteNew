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
        
        $request->validate(
            ['post_title' => 'required',],
            ['post_title.required'   => 'El nombre es requerido para el post del Blog!',]
        
        );

        $imgPost = $request->file('post_image');
        $imgName = hexdec(uniqid()).'.'.$imgPost->getClientOriginalExtension();
        $imgUrl = 'upload/post/'.$imgName;

        Image::make($imgPost)->resize(430,327)->save($imgUrl);
        
        BlogPost::insert([
            'category_id'   => $request->post_category_id,
            'title'         => $request->post_title,
            'tags'          => $request->post_tags,
            'image'         => $imgUrl,
            'description'   => $request->post_description,
            'created_at'    => Carbon::now(),
        ]);

        // Notificación de alerta para la vista
        $notifications = [
            'message'    => 'El post ha sido insertado correctamente',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.blog.post')->with($notifications);

    }

    public function EditBlogPost($id){

        $post = BlogPost::findOrFail($id);
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('admin.blog_post.blog_post_edit',compact('post','categories'));
    }


    public function UpdateBlogPost(Request $request){

        ///dd($request);
        
        $request->validate(
            ['post_title' => 'required',],
            ['post_title.required'   => 'El nombre es requerido para el post del Blog!',]
        
        );

        $idPost = $request->id;

        if($request->file('post_image')){

            $imgPost = $request->file('post_image');
            $imgName = hexdec(uniqid()).'.'.$imgPost->getClientOriginalExtension();
            $imgUrl = 'upload/post/'.$imgName;

            Image::make($imgPost)->resize(430,327)->save($imgUrl);
            
            BlogPost::findOrFail($idPost)->update([
                'category_id'   => $request->post_category_id,
                'title'         => $request->post_title,
                'tags'          => $request->post_tags,
                'image'         => $imgUrl,
                'description'   => $request->post_description,
            ]);

        }else{

            BlogPost::findOrFail($idPost)->update([
                'category_id'   => $request->post_category_id,
                'title'         => $request->post_title,
                'tags'          => $request->post_tags,
                'description'   => $request->post_description,
            ]);
        }

        // Notificación de alerta para la vista
        $notifications = [
            'message'    => 'El post ha sido actualizado correctamente',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.blog.post')->with($notifications);

    }

    public function DeleteBlogPost($id){

        $blogPost = BlogPost::findOrFail($id);
        $img = $blogPost->image;
        unlink($img);

        BlogPost::findOrFail($id)->delete();

        // Notificación de alerta para la vista
        $notifications = [
            'message'    => 'El post del blog ha sido eliminada correctamente',
            'alert-type' => 'success'
        ];
        
        return redirect()->back()->with($notifications);
    }
}
