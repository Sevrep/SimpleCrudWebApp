<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        return Item::orderBy('created_at', 'DESC')->get();
    }

    public function store(Request $request)
    {
        $newItem = new Item;
        $newItem->name = $request->item["name"];
        $newItem->save();
        return $newItem;
    }

    public function update(Request $request, $id)
    {
        $existingItem = Item::find($id);

        if ($existingItem) {
            $existingItem->name = $request->item['name'];
            $existingItem->save();
            return $existingItem;
        }
        return "Item not found.";
    }

    public function destroy($teams_id)
    {
        $existingItem = Item::find($teams_id);

        if ($existingItem) {
            $existingItem->delete();
            return "Item " . $teams_id . " successfully deleted.";
        }
        return "Item not found.";
    }
}
