<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function getCategory()
    {
        return Category::all();
    }

    public function getActiveCategory()
    {
        return Category::where('status', 1)->get();
    }

    public function createCategory(Request $request)
    {
        try {
            $name = $request->input('name');

            $count = Category::where('name', $name)->count();

            if ($count === 1) {

                return ResponseHelper::Out('failed', 'category already exits', [], 200);

            } else {
                Category::create([
                    'name' => $name,
                ]);
                return ResponseHelper::Out('success', 'added to category', [], 200);

            }

        } catch (Exception $e) {
            return ResponseHelper::Out('failed', 'Something went wrong', [$e], 500);
        }
    }

    public function updateCategory(Request $request)
     {
        try {
            $category_id = $request->input('id');
            $name = $request->input('name');
         

            $count = Category::where('name', $name)->count();

            if ($count === 1) {

                return ResponseHelper::Out('failed', 'Category name already exite', [], 200);

            } else {
                Category::where('id', $category_id)->update([
                    'name' => $name
                ]);
                return ResponseHelper::Out('success', 'Category updated', [], 200);
            }

        } catch (Exception $e) {
            return ResponseHelper::Out('failed', 'Something went wrong', [$e], 200);
        }

     }
    
    public function deleteCategory(Request $request)
     {
      try{
         $category_id = $request->input('id');
         
         // check if this category belongs to any product
         $count = Product::where('category_id',$category_id)->count();

         if($count >= 1){
            return ResponseHelper::Out('failed', 'Fail to Delete Category, because there are some product under this category', [], 200);
         }
         else{
           Category::where('id', $category_id)->delete();
           return ResponseHelper::Out('success', 'Category delete successfully', [], 200);
         }
          
      }catch (Exception $e){
         return ResponseHelper::Out('failed', 'Something went wrong', [$e], 200);
      }

     }

     public function updateStatus(Request $request){
        try{
            $category_id = $request->input('id');
            $new_status = $request->input('newStatus');
    
            Category::where('id',$category_id)->update([
               'status' =>$new_status
             ]);

             return ResponseHelper::Out('success', '', [], 200);  
        }catch (Exception $e){
            return ResponseHelper::Out('failed', 'Something went wrong', [$e], 200);
        }
       

     }
    public function categoryById(Request $request){
        $category_id = $request->input('id');
        return Category::where('id',$category_id)->first();
     }
    
    public function categoryPage()
     {
        return view('pages.admin.admin-category');
     }

}
