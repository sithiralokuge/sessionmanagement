<?php

namespace App\Http\Controllers;

use App\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index()
    {
        $Session = Session::all();
        return view('printSession')->with('Session', $Session);;
    }
    public function prnpriview()
    {
        $Session = Session::all();
        return view('Session')->with('Session', $Session);;
    }
    public function store(Request $request)
    {
        $session = new Session;

        $this->validate($request, [
            'SessionID' => 'required|max:150|min:3',
            'employees' => 'required|max:150|min:3',
            'place' => 'required'

        ]);
        $session->SessionID = $request->SessionID;
        $session->employees = $request->employees;
        $session->hours = $request->hours;
        $session->date = $request->date;
        $session->time = $request->time;
        $session->place = $request->place;

        $session->save();
        $SeData = Session::all();

        return redirect()->back();


    }


    public function delete($id){
        $session = Session::find($id);
        $session-> delete();

        return redirect()->back();


    }
    public function updateview($id)
    {
        $session = Session::find($id);

        return view('UpdateSession')->with('updata', $session);
    }
    public function update(Request $request){
        $id=$request->id;
        $SessionID=$request->SessionID;
        $employees = $request->employees;
        $hours = $request->hours;
        $date = $request->date;
        $time = $request->time;
        $place = $request->place;

        $SeData=Session::find($id);
        $SeData->SessionID=$SessionID;
        $SeData->employees = $request->employees;
        $SeData->hours = $request->hours;
        $SeData->date = $request->date;
        $SeData->time = $request->time;
        $SeData->place = $request->place;

        $SeData->save();

        $SeDatas=Session::all();


        return view('AddSession')->with('AddSession', $SeDatas);




    }
}
