<?php

namespace App\Http\Controllers;

use App\Models\Bug;
use Illuminate\Http\Request;

class BugController extends Controller
{
    public function create(Request $request)
    {

        $this->validate($request, [
            'description' => 'required',
        ]);

        $bug = new Bug;
        $bug->description = $request->input('description');
        $bug->user_id = auth()->user()->id;

        $bug->save();

        return response()->json([
            'message' => 'Registro salvo com sucesso'
        ]);
    }
}
