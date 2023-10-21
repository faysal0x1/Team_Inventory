<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class ProductController extends Controller
{

    public function getProduct(Request $request)
    {
        // $user_id = $request->header('id');
        $user_id = 8;
        return Product::where('user_id', $user_id)->with('unit', 'category')->get();
    }
    public function getActiveProduct(Request $request)
     {  // $user_id = $request->header('id');
        $user_id = 8;
        return Product::where('user_id',$user_id)->where('status', 1)->get();
     }

    public function createProduct(Request $request)
    {
        try {
            // $user_id = $request->header('id');
            $user_id = 8;

            $img = $request->file('image');
            $currentTime = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$user_id}-{$currentTime}-{$file_name}";
            $img_url = "upload/product/{$img_name}";

            $product = Product::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'image' => $img_url,
                'quantity' => $request->input('quantity'),
                'stock' => $request->input('stock'),
                'price' => $request->input('price'),
                'user_id' => $user_id,
                'unit_id' => $request->input('unit_id'),
                'category_id' => $request->input('category_id'),
            ]);
            if ($product) {
                //upload image
                $img->move(public_path('upload/product'), $img_name);
                return ResponseHelper::Out('success', 'Product Added Successfully', [], 200);
            } else {
                return ResponseHelper::Out('failed', 'can not add the product', [], 200);
            }

        } catch (Exception $e) {
            return ResponseHelper::Out('failed', 'Something went wrong', [$e], 200);
        }

    }

    public function deleteProduct(Request $request)
    {
        try {
            // $user_id = $request->header('id');
            $user_id = 8;

            $product_id = $request->input('id');
            $filePath = $request->input('file_path');

            //delete from database
            $count = Product::where('user_id', $user_id)->where('id', $product_id)->delete();

            if ($count === 1) {
                //delete the file
                File::delete($filePath);
                return ResponseHelper::Out('success', 'Delete Successfully', [], 200);
            } else {
                return ResponseHelper::Out('failed', 'Can not delete', [], 200);
            }

        } catch (Exception $e) {

            return ResponseHelper::Out('failed', 'SOmething went wrong', [$e], 200);

        }

    }

    public function updateProduct(Request $request)
    {
        try {
            // $user_id = $request->header('id');
            $user_id = 8;
            $product_id = $request->input('product_id');

            if ($request->hasFile('image')) {
                $img = $request->file('image');
                $currentTime = time();
                $file_name = $img->getClientOriginalName();
                $img_name = "{$user_id}-{$currentTime}-{$file_name}";
                $img_url = "upload/product/{$img_name}";

                $product = Product::where('user_id', $user_id)->where('id', $product_id)->update([
                    'name' => $request->input('name'),
                    'description' => $request->input('description'),
                    'image' => $img_url,
                    'quantity' => $request->input('quantity'),
                    'stock' => $request->input('stock'),
                    'price' => $request->input('price'),
                    'unit_id' => $request->input('unit_id'),
                    'category_id' => $request->input('category_id'),

                ]);
                if ($product) {
                    //upload image
                    $img->move(public_path('upload/product'), $img_name);
                    //delete old image
                    $filePath = $request->input('file_path');
                    File::delete($filePath);
                    return ResponseHelper::Out('success', "Product Updated", [], 200);
                } else {
                    return ResponseHelper::Out('failed', "Can not update", [], 200);
                }

            } else {
                $product2 = Product::where('user_id', $user_id)->where('id', $product_id)->update([
                    'name' => $request->input('name'),
                    'description' => $request->input('description'),
                    'quantity' => $request->input('quantity'),
                    'stock' => $request->input('stock'),
                    'price' => $request->input('price'),
                    'unit_id' => $request->input('unit_id'),
                    'category_id' => $request->input('category_id'),
                ]);
                if ($product2) {
                    return ResponseHelper::Out('success', "Product Updated", [], 200);
                } else {
                    return ResponseHelper::Out('failed', "Can not update", [], 200);
                }

            }

        } catch (Exception $e) {
            return ResponseHelper::Out('failed', "something went wrong", [$e], 500);
        }

    }

    public function productById(Request $request)
    { // $user_id = $request->header('id');
        $user_id = 8;
        return Product::where('user_id', $user_id)->where('id', $request->input('id'))->first();
    }

    public function updateProductStatus(Request $request)
    {
        try {
            $product_id = $request->input('id');
            $new_status = $request->input('newStatus');

            Product::where('id', $product_id)->update([
                'status' => $new_status,
            ]);

            return ResponseHelper::Out('success', '', [], 200);
        } catch (Exception $e) {
            return ResponseHelper::Out('failed', 'Something went wrong', [$e], 200);
        }
    }

    //page routes
    public function productPage(): View
    {
        return view('pages.admin.admin-product');
    }
}
