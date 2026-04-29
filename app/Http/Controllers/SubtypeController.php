<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subtype;
use App\Models\Type;

class SubtypeController extends Controller
{
    public function index() {
        $title = "Subtype";

        return view('subtypes/index', compact('title'));
    }

    public function get() {
        $title = "Subtypes";
        $subtypes = Subtype::with('type')->where('status', 1)->get();

        $html = view('subtypes/ajax_get_subtypes_list', compact('title', 'subtypes'))->render();

        return response()->json([
            'status' => 1,
            'message' => 'subtypes data get successfully.',
            'html' => $html,
        ]);
    }

    public function create() {
        $title = "Add Subtype";
        $types = Type::where('status', 1)->get();
        $subtype = null;

        $html = view('subtypes/ajax_get_add_subtype_modal', compact('title', 'types'))->render();

        return response()->json([
            'status' => 1,
            'message' => 'Subtype modal open successfully.',
            'html' => $html,
        ]);
    }

    public function edit($id) {
        $title = "Edit Subtype";
        $types = Type::where('status', 1)->get();
        $subtype = Subtype::find($id);

        $html = view('subtypes/ajax_get_add_subtype_modal', compact('title', 'types', 'subtype'))->render();

        return response()->json([
            'status' => 1,
            'message' => 'Subtype modal open successfully.',
            'html' => $html,
        ]);
    }

    public function store(Request $request) {

        $subtype_id = $request->subtype_id;

        $subtype = $request->validate([
            'name' => 'required|string|max:255',
            'image' => ($request->subtype_id ? 'nullable' : 'required').'|mimes:png,jpg,jpeg',
            'type_id' => 'required|integer',
        ]);

        if($request->hasFile('image') && $request->file('image')) {
            $file = $request->file('image');

            $file_name = time(). '.' .$file->getClientOriginalExtension();

            $path = public_path('uploads');

            if(!file_exists($path)){
                mkdir($path, 0777, true);
            }

            $file->move($path, $file_name);

            $subtype['image'] = $file_name;
        }

        if(!empty($subtype_id)) {
            $subtypeData = Subtype::find($subtype_id);
            $subtypeData->update($subtype);
        }else {
            $subtype = Subtype::create($subtype);
        }

        return response()->json([
            'status' => 1,
            'message' => 'store data successfully.',
        ]);
    }

    public function destroy($id) {
        $subtype = Subtype::find($id);

        $subtype->delete();

        return response()->json([
            'status' => 1,
            'message' => 'Subtype delete successfully.',
        ]);
    }
}
