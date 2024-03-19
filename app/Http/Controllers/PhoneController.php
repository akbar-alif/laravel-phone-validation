<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application {
        $phoneNumbers = Phone::all();
        return view('phone-number', compact('phoneNumbers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'number' => 'required|phone:TJ',
        ]);

        Phone::create([
            'title' => $request->input('title'),
            'number' => $request->input('number'),
        ]);

        return redirect()->back()->with('success', 'Phone number saved successfully.');
    }

    public function destroy($id)
    {

        Phone::destroy([$id]);

        return redirect()->back()->with('success', 'Phone number deleted successfully.');
    }
}
