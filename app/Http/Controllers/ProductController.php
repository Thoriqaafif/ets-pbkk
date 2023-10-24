<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Barang;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    //

    public function show(): View
    {
        return view('product.show',[
            'products' => Barang::all(),
        ]);
    }

    public function add(): View
    {
        return view('product.add');
    }

    public function new(Request $request): RedirectResponse
    {
        $request->validate([
            'jenis' => 'required',
            'kondisi' => 'required',
            'keterangan' => 'required',
            'kecacatan' => 'required',
            'jumlah' => 'required|integer',
            'image' => 'required|mimes:jpg,jpeg,png'
        ]);

        $request->foto->storeAs('public/img', $request->foto->getClientOriginalName());

        $product = new Barang();
        $product->jenis = $request->jenis;
        $product->kondisi = $request->kondisi;
        $product->keterangan = $request->keterangan;
        $product->kecacatan = $request->kecacatan;
        $product->jumlah = $request->jumlah;        
        $product->foto = $request->foto;
        $product->save();
        return Redirect::view('success');
    }

    public function edit(Request $request, $id): View
    {
        $product = Barang::find($id);
        return view('product.edit', [
            'product' => $product,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request, $id): RedirectResponse
    {
        $product = Barang::find($id);
        $request->user()->fill($request->validated());

        $product->jenis = $request->jenis;
        $product->kondisi = $request->kondisi;
        $product->keterangan = $request->keterangan;
        $product->kecacatan = $request->kecacatan;
        $product->jumlah = $request->jumlah;

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'product-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request, $id): RedirectResponse
    {
        $deleted = DB::table('barangs')->where('id', '=', $id)->delete();
        return Redirect::route('product.show');
    }
}
