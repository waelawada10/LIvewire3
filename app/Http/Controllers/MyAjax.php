<?php

namespace App\Http\Controllers;

use App\Models\AjaxForm;
use Illuminate\Http\Request;

class MyAjax extends Controller
{
    public function submitForm(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'dob' => 'required|date',
            'email' => 'required|email',
            'phone' => 'required|string',
        ]);
        $ajaxForm = AjaxForm::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'dob' => $data['dob'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
        ]);

        return response()->json(['success' => 'Data created successfully.']);
    }

    public function view()
    {
        return view('laravel.myAjax');
    }
}
