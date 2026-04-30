<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Type;
use App\Models\Subtype;

class PatientController extends Controller
{
    public function index() {
        $title = "Patient Lists";

        return view('patients/index', compact('title'));
    }

    public function get() {
        $title = "Patients List";
        $patients = Patient::with('type', 'subtype')->where('status', 1)->get();

        $html = view('patients/ajax_get_patient_list', compact('title', 'patients'))->render();

        return response()->json([
            'status' => 1,
            'message' => 'Patients list show successfully.',
            'html' => $html,
        ]);
    }

    public function create() {
        $title = "Add Patient";
        $types = Type::where('status', 1)->get();
        $subtypes = Subtype::where('status', 1)->get();

        $html = view('patients/ajax_get_add_patient_modal', compact('title', 'types', 'subtypes'))->render();

        return response()->json([
            'status' => 1,
            'message' => 'Add modal open successfully',
            'html' => $html,
        ]);
    }

    public function store(Request $request) {
        $patient = $request->validate([
            'full_name'      => ['required', 'string', 'max:255'],
            'age'            => ['required', 'integer', 'min:0', 'max:120'],
            'gender'         => ['required'],
            'contact_number' => ['required', 'digits:10'], // Assuming a 10-digit phone number
            'type_id'           => ['required'],
            'subtype_id'        => ['required'],
            'department'     => ['required', 'string', 'max:100'],
            'doctor_assigned'=> ['required', 'string', 'max:100'],
            'room_number'    => ['required', 'string', 'max:20'],
            'status'         => ['required', 'in:1,0'],
            'bill_amount'         => ['required', 'numeric', 'min:0'],
            'admission_date'     => ['required', 'date'],
            'discharge_date' => ['nullable', 'date', 'after_or_equal:admit_date'],
        ]);

        $patient = Patient::create($patient);

        return response()->json([
            'status' => 1,
            'message' => 'data store succesfully.',
        ]);
    }
}
