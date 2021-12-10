<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advance;
//use App\Http\Requests\ClientRequest;

class IndexController extends Controller
{
    /*
    public function index()
    {
        $items = DB::select('select * from tests2');
        return view('index', ['items' => $items]);
    }
    public function create(Request $request)
    {
        $param = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'email' => $request->email,
        ];
        DB::insert('insert into tests (name, mail) values (:name, :mail)', $param);
        return redirect('/thanks');
    }
*/


    public function index(Request $request)
    {
        return view('index');
    }

    //public function post(ClientRequest $request)
    //{

    public function confirm(Request $request)
    {
        $inputs = $request->all();
        $this->validate($request, Advance::$rules);
        return view('confirm',['inputs'=>$inputs]);
    }

    public function process(Request $request)
    {
        $action = $request->get('action', 'return');
        $input  = $request->except('action');

        if ($action === 'submit') {

            // DBにデータを保存
            $contact = new Advance();
            $contact->fill($input);
            $contact->save();

            return redirect('/thanks');
        } else {
            return redirect('/index')->withInput($input);
        
        }
    }

    

    public function thanks()
    {
        return view('thanks');
    }
/*
    public function index()
    {
        $items = Advance::all();
        return view('index', ['items' => $items]);
    }

    public function confirm(IndexFormRequest $request)
    {
        $contact = $request->all();
        return view('index.confirm', compact('index'));
    }

    public function create(Request $request)
    {
        $this->validate($request, Advance::$rules);
        $form = $request->all();
        Advance::create($form);
        return redirect('/thanks');
        */
}