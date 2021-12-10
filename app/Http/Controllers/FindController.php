<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advance;

class FindController extends Controller
{
    public function management()
    {
        $items = Advance::all();
        return view('management', ['items' => $items]);
    }

    public function find()
    {
        return view('find', ['input' => '']);
    }

    public function search(Request $request)
    {
        $item = Advance::where('last_name', 'LIKE', "%{$request->input}%")->first();
        $param = [
            'input' => $request->input,
            'item' => $item
        ];
        return view('find', $param);
    }

}
