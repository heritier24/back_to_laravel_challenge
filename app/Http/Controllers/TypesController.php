<?php

namespace App\Http\Controllers;

use App\Models\Types;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TypesController extends Controller
{
    public function index(){
        $types = Types::all(['id', 'types']);

        return response()->json([
            'types' => $types
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'types' => 'required',
        ]);

        $types = Types::create([
            'types' => $request->types
        ]);
        return response()->json([
            'types' => $types
        ], Response::HTTP_CREATED);
    }
}
