<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        $no = 1;
        $product = Product::all();

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Tidak Ada Data Jadwal'
            ], 401);
        }

        return response()->json([
            'success' => true,
            'data' => $product
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'price'     => 'required|numeric',
            'stok'     => 'required|numeric',
            'description'     => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $product = Product::create([
            'name'      => $request->name,
            'price'     => $request->price,
            'stok'     => $request->stok,
            'description'     => $request->description,
        ]);

        if ($product) {
            return response()->json([
                'success' => true,
                'message' => 'Data Product Berhasil Ditambahkan'
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data Product Gagal Ditambahkan'
        ], 409);
    }

    public function update(Request $request, Product $product)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name'      => 'required',
                'price'     => 'required|numeric',
                'stok'     => 'required|numeric',
                'description'     => 'required',
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $product->update($request->all());

        if ($product) {
            return response()->json([
                'success' => true,
                'message' => 'Data Product Berhasil Diupdate'
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data Product Gagal Diupdate'
        ], 409);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Data Product Gagal Dihapus'
            ], 401);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus',
        ]);
    }
}
