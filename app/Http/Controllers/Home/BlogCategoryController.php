<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Carbon\Carbon;

class BlogCategoryController extends Controller
{
    
    // GET
    public function AllBlogCategory() {

        $blogCategory = BlogCategory::latest()->get();
        //dd($blogCategory);
        return view('admin.blog_category.blog_category_all',compact('blogCategory'));

    }


    public function AddBlogCategory(){

        return view('admin.blog_category.blog_category_add');
 
    }


    // POST
    public function StoreBlogCategory(Request $request){

        $request->validate(
            ['blog_category' => 'required',],
            ['blog_category.required'   => 'El nombre es requerido para la categoría del Blog!',]
        
        );

        BlogCategory::insert([
            'blog_category' => $request->blog_category,
            'created_at' => Carbon::now(),
        ]);

        // Notificación de alerta para la vista
        $notifications = [
            'message'    => 'La categoría del blog ha sido insertada correctamente',
            'alert-type' => 'success'
        ];
        
        return redirect()->route('all.blog.category')->with($notifications);
    }


    public function EditBlogCategory($id){

        $category = BlogCategory::findOrFail($id);
        //dd($category);

        return view('admin.blog_category.blog_category_edit',compact('category'));

    }


    public function UpdateBlogCategory (Request $request,$id){
        
        //dd($id);
        $request->validate(
            ['blog_category' => 'required',],
            ['blog_category.required'   => 'El nombre es requerido para la categoría del Blog!',]
        
        );

        BlogCategory::findOrFail($id)->update([
            'blog_category' => $request->blog_category,
        ]);

        // Notificación de alerta para la vista
        $notifications = [
            'message'    => 'La categoría del blog ha sido actualizada correctamente',
            'alert-type' => 'success'
        ];
        
        return redirect()->route('all.blog.category')->with($notifications);
    }

    public function DeleteBlogCategory(Request $request, $id){

        BlogCategory::findOrFail($id)->delete();

        // Notificación de alerta para la vista
        $notifications = [
            'message'    => 'La categoría del blog ha sido eliminada correctamente',
            'alert-type' => 'success'
        ];
        
        return redirect()->back()->with($notifications);

    }



}
