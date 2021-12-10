<?php

namespace App\Http\Controllers;

use App\Models\Advance;
use Illuminate\Http\Request;


class AdvanceController extends Controller
{
    public function index2()
    {
        $item = Advance::Paginate(4);

        return view('advance', ['item' => $item]);
    }

    public function find()
    {
        return view('advance', ['input' => '']);
    }


    public function search(Request $request)
    {
        $name = Advance::where('last_name', 'LIKE', "%{$request->name}%")->orwhere('first_name', 'LIKE', "%{$request->name}%")->paginate(10);

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



    public function delete(Request $request)
    {
        $advance = Advance::advance($request->id);
        return view('delete', ['form' => $advance]);
    }
}
