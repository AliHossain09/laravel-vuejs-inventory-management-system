<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopApiController extends Controller
{
    public function index()
    {
        return Shop::latest()->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        return Shop::create([
            'name' => $request->name,
            'admin_id' => Auth::id(), 
        ]);
    }

    public function show($id)
    {
        return Shop::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $shop = Shop::findOrFail($id);
        $shop->update($validated);

        return $shop;
    }

    public function destroy($id)
    {
        return Shop::destroy($id);
    }
}
