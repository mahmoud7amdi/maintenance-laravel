<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SubCategoryController extends Controller
{
    public function AllSubCategory()
    {
        $subcategories = SubCategory::latest()->get();
        return view('admin.backend.subcategory.all_subcategory',compact('subcategories'));
    }

    public function AddSubCategory()
    {
        $categories = Category::orderBy('category_name','ASC')->get();
        return view('admin.backend.subcategory.add_subcategory',compact('categories'));
    }


    public function StoreSubCategory(Request $request)
    {
        $image = $request->file('subcategory_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(120,120)->save('upload/subcategory/'.$name_gen);
        $save_url ='upload/subcategory/'.$name_gen ;
        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-', $request->subcategory_slug)),
            'subcategory_image' => $save_url
        ]);
        $notification = array(
            'message' => 'SubCategory Add Successfully',
            'alert_type' => 'success'
        );
        return redirect()->route('all.subcategory')->with($notification);
    }

    public function EditSubCategory($id)
    {
        $categories = Category::orderBy('category_name','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('admin.backend.subcategory.edit_subcategory',compact('subcategory','categories'));
    }


    public function UpdateSubCategory(Request $request)
    {
        $subcat_id = $request->id;
        $old_image = $request->subcategory_image;

        if($request->file('subcategory_image')){
            $image = $request->file('subcategory_image');
            $name_gen = hexdec(uniqid().'.'.$image->getClientOriginalExtension());
            Image::make($image)->resize(120,120)->save('upload/subcategory/'.$name_gen);
            $save_url = 'upload/subcategory/'.$name_gen;
            if (file_exists($old_image)){
                unlink($old_image);
            }
            SubCategory::findOrFail($subcat_id)->update([
                'category_id' => $request->category_id,
                'subcategory_name' =>  $request->subcategory_name,
                'subcategory_slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),
                'subcategory_image' => $save_url
            ]);
            $notification = array(
                'message' => 'SubCategory Updated with image Successfully',
                'alert_type' => 'success'
            );
            return redirect()->route('all.subcategory')->with($notification);
        }else{
            SubCategory::findOrFail($subcat_id)->update([
                'category_id' => $request->category_id,
                'subcategory_name' =>  $request->subcategory_name,
                'subcategory_slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),

            ]);
            $notification = array(
                'message' => 'SubCategory Updated without image Successfully',
                'alert_type' => 'success'
            );
            return redirect()->route('all.subcategory')->with($notification);
        }

    }




    public function DeleteSubCategory($id)
    {

        SubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'SubCategory Deleted Successfully',
            'alert_type' => 'success'
        );
        return redirect()->back()->with($notification);

    }


}
