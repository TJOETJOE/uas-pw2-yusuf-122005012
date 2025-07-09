<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WishlistItem;

class WishlistItemController extends Controller
{
    public function index(Request $request)
    {
        $query = WishlistItem::query();

        // Filter
        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }

        if ($request->filled('bought')) {
            $query->where('bought', $request->bought == '1');
        }

        // Sort
        if ($request->sort == 'newest') {
            $query->orderBy('created_at', 'desc');
        } elseif ($request->sort == 'oldest') {
            $query->orderBy('created_at', 'asc');
        }

        $items = $query->get();

        return view('wishlist.index', compact('items'));
    }

    public function create()
    {
        return view('wishlist.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'priority' => 'required',
            'price' => 'nullable|numeric|min:0',
            'link' => 'nullable|url',
            'description' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['bought'] = $request->has('bought');

        WishlistItem::create($data);

        return redirect('/')->with('success', 'Item added!');
    }

    public function edit(WishlistItem $wishlist)
    {
        return view('wishlist.edit', compact('wishlist'));
    }

    public function update(Request $request, WishlistItem $wishlist)
    {
        $request->validate([
            'name' => 'required',
            'priority' => 'required',
            'price' => 'nullable|numeric|min:0',
            'link' => 'nullable|url',
            'description' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['bought'] = $request->has('bought');

        $wishlist->update($data);

        return redirect('/')->with('success', 'Item updated!');
    }

    public function destroy(WishlistItem $wishlist)
    {
        $wishlist->delete();

        return redirect('/')->with('success', 'Item deleted!');
    }
}
