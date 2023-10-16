<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.supplier.index');
    }

    public function supplierlist()
    {
        $supplier = User::where('role', 'supplier')->get();

        return $supplier;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            // dd($request->all());
            $email = $request->email;

            $count = User::where('email', $email)->count();

            if ($count === 1) {
                return ResponseHelper::Out('failed', 'Email is Already Exists', [], 401);

            } else {
                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'password' => $request->password,
                    'status' => 1,
                    'role' => 'supplier',
                ]);

              return response()->json([
                'status'=>'success',
                'message'=>'Supplier created successfully',
              ],200);

            }

        } catch (Exception $e) {

            return response()->json([
                'status'=>'failed',
                'message'=>'Something Went wrong',
              ]);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $supplier = User::where('id', $id)->first();

        return $supplier;
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $supplier = User::where('id', $id)->first();
            $supplier->update($request->only('name', 'email', 'phone', 'password'));

            $response = [
                'status' => 'success',
                'message' => 'Supplier updated successfully',
            ];

            return response()->json($response, 200);
        } catch (Exception $th) {

            $response = [
                'status' => 'success',
                'message' => 'Supplier updated successfully',
            ];

            return response()->json($response, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $supplier = User::where('id', $id)->first();

            $supplier->delete();

            return response()->json(
                ['status' => 'success', 'message' => 'Supplier deleted successfully',
                ], 200);

        } catch (Exception $e) {
            $response = [
                'status' => 'failed',
                'message' => 'Something went wrong',
            ];

            return response()->json($response, 401);
        }

    }
}
