<?php

namespace App\Http\Controllers;

use App\Models\Advance;
use Illuminate\Http\Request;


class AdvanceController extends Controller
{
    public function index()
    {
        $items = Advance::Paginate(4);

        return view('index', ['items' => $items]);
    }

    public function find()
    {
        return view('advance', ['input' => '']);
    }


    public function search(Request $request)
    {
        $name = Advance::where('last_name', 'LIKE', "%{$request->name}%")->orwhere('first_name', 'LIKE', "%{$request->name}%")->get();

        $param = [
            'name' => $request->name,
            'item' => $name,
        ];
        return view('advance', $param);
    }







    public function bind(Advance $advance)
    {
        $data = [
            'item' => $advance,
        ];
        return view('advance.binds', $data);
    }
}


