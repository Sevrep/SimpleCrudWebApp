<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{

    // public function index()
    // {
    //     $data = Item::orderBy('created_at', 'DESC')->get();
    //     return view('welcome', ['items' => $data]);
    // }

    // public function store(Request $request)
    // {
    //     if ($request->get('name') != null) {
    //         $newItem = new Item;
    //         $newItem->name = $request->get('name');
    //         $newItem->save();
    //     }
    //     return redirect('/items');
    // }

    // public function update(Request $request, $id)
    // {
    //     $existingItem = Item::find($id);

    //     if ($existingItem) {
    //         $existingItem->name = $request->get('name');
    //         $existingItem->save();
    //         return $existingItem;
    //     }
    //     return "Item not found.";
    // }

    // public function destroy($teams_id)
    // {
    //     $existingItem = Item::find($teams_id);

    //     if ($existingItem) {
    //         $existingItem->delete();
    //         return "Item " . $teams_id . " successfully deleted.";
    //     }
    //     return "Item not found.";
    // }

    public function index()
    {
        $items = Item::latest()->paginate(5);
        return view('items.index', compact('items'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Item::create($request->all());
        return redirect()->route('items.index')->with('success', 'Item created successfully.');
    }

    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $item->update($request->all());
        return redirect()->route('items.index')->with('success', 'Item updated successfully');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item deleted successfully');
    }
}
