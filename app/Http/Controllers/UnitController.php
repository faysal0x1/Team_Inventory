<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Helper\ResponseHelper;
use App\Models\Product;
use Exception;

class UnitController extends Controller
{
    public function getUnits()
    {
        return Unit::all();
    }

    public function getActiveUnits()
    {
        return Unit::where('status', 1)->get();
    }

    public function createUnit(Request $request)
    {
        try {
            $name = $request->input('name');

            $count = Unit::where('name', $name)->count();

            if ($count === 1) {

                return ResponseHelper::Out('failed', 'Unit already exits', [], 200);

            } else {
                Unit::create([
                    'name' => $name,
                ]);

                return ResponseHelper::Out('success', 'Unit adds successfully', [], 200);

            }

        } catch (Exception $e) {
            return ResponseHelper::Out('failed', 'Something went wrong', [$e], 200);
        }
    }

    public function updateUnit(Request $request)
     {
        try {
            $unit_id = $request->input('id');
            $name = $request->input('name');
         

            $count = Unit::where('name', $name)->count();

            if ($count === 1) {

                return ResponseHelper::Out('failed', 'Unit already exite', [], 200);

            } else {
                Unit::where('id', $unit_id)->update([
                    'name' => $name
                ]);
                return ResponseHelper::Out('success', 'Unit updated', [], 200);
            }

        } catch (Exception $e) {
            return ResponseHelper::Out('failed', 'Something went wrong', [$e], 500);
        }

     }
    
    public function deleteUnit(Request $request)
     {
      try{
         $unit_id = $request->input('id');
         
         // check if this category belongs to any product
         $count = Product::where('category_id',$unit_id)->count();

         if($count >= 1){
            return ResponseHelper::Out('failed', 'Fail to Delete Unit, because there are some product under this unit', [], 200);
         }
         else{
           Unit::where('id', $unit_id)->delete();
           return ResponseHelper::Out('success', 'Unit delete successfully', [], 200);
         }
          
      }catch (Exception $e){
         return ResponseHelper::Out('failed', 'Something went wrong', [$e], 200);
      }

     }

     public function updateUnitStatus(Request $request){
        try{
            $unit_id = $request->input('id');
            $new_status = $request->input('newStatus');
    
            Unit::where('id',$unit_id)->update([
               'status' =>$new_status
             ]);

             return ResponseHelper::Out('success', '', [], 200);  

        }catch (Exception $e){
            return ResponseHelper::Out('failed', 'Something went wrong', [$e], 200);
        }
       

     }
    public function unitById(Request $request){
        $unit_id = $request->input('id');
        return Unit::where('id',$unit_id)->first();
     }
    
    public function unitPage()
     {
        return view('pages.admin.admin-unit');
     }

   
}
