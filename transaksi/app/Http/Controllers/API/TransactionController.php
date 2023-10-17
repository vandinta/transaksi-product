<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{
    public function index()
    {
        $no = 1;
        $transaction = Transaction::all();

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Tidak Ada Data Jadwal'
            ], 401);
        }

        return response()->json([
            'success' => true,
            'data' => $transaction
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

        $transaction = Transaction::create([
            'name'      => $request->name,
            'price'     => $request->price,
            'stok'     => $request->stok,
            'description'     => $request->description,
        ]);

        if ($transaction) {
            return response()->json([
                'success' => true,
                'message' => 'Data Transaction Berhasil Ditambahkan'
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data Transaction Gagal Ditambahkan'
        ], 409);
    }

    public function update(Request $request, Transaction $transaction)
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

        $transaction->update($request->all());

        if ($transaction) {
            return response()->json([
                'success' => true,
                'message' => 'Data Transaction Berhasil Diupdate'
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data Transaction Gagal Diupdate'
        ], 409);
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Data Transaction Gagal Dihapus'
            ], 401);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus',
        ]);
    }
}
