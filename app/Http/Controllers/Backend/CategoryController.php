<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function AllCategory()
    {
        $categories = Category::latest()->get();
        return view('admin.backend.category.all_category',compact('categories'));
    }
    public function AddCategory()
    {
        return view('admin.backend.category.add_category');
    }

    public function StoreCategory(Request $request)
    {
        $image = $request->file('category_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(120,120)->save('upload/category/'.$name_gen);
//        $request->validate([
//            'category_name' => 'required',
//        ]);
        $save_url ='upload/category/'.$name_gen ;
        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
            'category_image' => $save_url
        ]);
        $notification = array(
            'message' => 'Category Add Successfully',
            'alert_type' => 'success'
        );
        return redirect()->route('all.category')->with($notification);
    }

    public function EditCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.backend.category.edit_category',compact('category'));
    }

    public function UpdateCategory(Request $request)
    {
        $category_id = $request->id ;
        $old_image =$request->old_image;
        if($request->file('category_image')){
            $image = $request->file('category_image');
            $name_gen = hexdec(uniqid().'.'.$image->getClientOriginalExtension());
            Image::make($image)->resize(120,120)->save('upload/category/'.$name_gen);
            $save_url = 'upload/category/'.$name_gen;
            if (file_exists($old_image)){
                unlink($old_image);
            }
            Category::findOrFail($category_id)->update([
                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
                'category_image' => $save_url
            ]);
            $notification = array(
                'message' => 'Category Updated with image Successfully',
                'alert_type' => 'success'
            );
            return redirect()->route('all.category')->with($notification);
        }else{
            Category::findOrFail($category_id)->update([
                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),

            ]);
            $notification = array(
                'message' => 'Category Updated without image Successfully',
                'alert_type' => 'success'
            );
            return redirect()->route('all.category')->with($notification);
        }

    }

    public function DeleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $img = $category->category_image ;
        unlink($img);
        Category::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert_type' => 'success'
        );
        return redirect()->route('all.category')->with($notification);
    }

}
