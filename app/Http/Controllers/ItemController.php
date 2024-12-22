<?php


namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    // Afficher tous les éléments
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('items.create');
    }

    // Sauvegarder un nouvel élément
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Item::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('items.index');
    }

    // Afficher un élément
    public function show($id)
    {
        $item = Item::findOrFail($id);
        return view('items.show', compact('item'));
    }

    // Afficher le formulaire d'édition
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('items.edit', compact('item'));
    }

    // Mettre à jour un élément
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $item = Item::findOrFail($id);
        
        $item->name = $request->name;
        $item->description = $request->description;

        if ($request->hasFile('image')) {
            Storage::delete('public/' . $item->image);
            $item->image = $request->file('image')->store('images', 'public');
        }

        $item->save();

        return redirect()->route('items.index');
    }

    // Supprimer un élément
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        Storage::delete('public/' . $item->image);
        $item->delete();

        return redirect()->route('items.index');
    }
}
