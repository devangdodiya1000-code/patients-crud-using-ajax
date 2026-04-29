<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function index() {
        $title = "Types List";

        return view('types/index', compact('title'));
    }

    public function get() {
        $types = Type::where('status', 1)->get();

        $html = view('types/ajax_get_types', compact('types'))->render();

        return response()->json([
            'status' => 1,
            'message' => "Types get successfully",
            'html' => $html,
        ]);
    }

    public function create() {
        $title = "Add Type Modal";
        $type = null;

        $html = view('types/ajax_get_add_update_type_modal', compact('title', 'type'))->render();

        return response()->json([
            'status' => 1,
            'message' => 'Type model open successfully',
            'html' => $html,
        ]);
    }

    public function edit($id) {
        $title = 'Edit Type Modal';
        $type = Type::find($id);

        $html = view('types/ajax_get_add_update_type_modal', compact('title', 'type'))->render();

        return response()->json([
            'status' => 1,
            'message' => 'Edit modal open successfully.',
            'html' => $html,
        ]);
    }

    public function store(Request $request) {
        $type_id = $request->type_id;

        $type = $request->validate([
            'name' => 'required|string|max:255',
            'image' => ($type_id ? 'nullable' : 'required'). '|mimes:png,jpg,jpeg',
        ]);

        if($request->hasFile('image') && $request->file('image')) {
            $file = $request->file('image');

            $file_name = time(). '.' .$file->getClientOriginalExtension();

            $path = public_path('uploads');

            if(!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $file->move($path, $file_name);

            $type['image'] = $file_name;
        }

        if($type_id) {
            $typeData = Type::find($type_id);
            $typeData->update($type);
        }else {
            $type = Type::create($type);
        }

        return response()->json([
            'status' => 1,
            'message' => 'Type added successfully.',
        ]);
    }

    public function destroy($id) {
        $type = Type::find($id);

        $type->delete();

        return response()->json([
            'status' => 1,
            'message' => 'Type delete successfully.',
        ]);
    }
}
