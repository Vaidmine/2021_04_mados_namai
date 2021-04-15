<?php

namespace App\Http\Controllers;

use App\Models\Master;
use Illuminate\Http\Request;
use Validator;

class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // $masters =  $request -> sort ? Master::orderBy ('name')->get() : Master::all();
        // $masters = Master::all(); //
        // $masters = Master::orderBy('name')->get(); // rusiavimas pagal name

        if ('name' == $request -> sort){
            $masters = Master::orderBy('name')-> get();  // pagal varda
        }
        elseif ('surname' ==$request -> sort) {
            $masters = Master::orderBy('surname')-> get();  //pagal pavarde
        }
        else {
            $masters = Master::all();  //default
        }
        

        return view('master.index', ['masters' => $masters]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),
        [
            'master_name' => ['required', 'min:3', 'max:64'],
            'master_surname' => ['required', 'min:3', 'max:64'],
        ],
        [
            'master_name.required' => 'Name is missing!',
            'master_name.min' => 'Name is too short!',
            'master_name.max' => 'Name is too long!',
            'master_surname.required' => 'Surname is missing!',
            'master_surname.min' => 'Surname is too short!',
            'master_surname.max' => 'Surname is too long!',
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
 
        


        $master = new Master;
        $master->name = $request->master_name;
        $master->surname = $request->master_surname;
        $master->save();
        return redirect()->route('master.index')->with('success_message', 'Great Sucess!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function show(Master $master)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function edit(Master $master)
    {
        return view('master.edit', ['master' => $master]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Master $master)
    {

        $validator = Validator::make($request->all(),
        [
            'master_name' => ['required', 'min:3', 'max:64'],
            'master_surname' => ['required', 'min:3', 'max:64'],
        ],
        [
            'master_name.required' => 'Name is missing!',
            'master_name.min' => 'Name is too short!',
            'master_name.max' => 'Name is too long!',
            'master_surname.required' => 'Surname is missing!',
            'master_surname.min' => 'Surname is too short!',
            'master_surname.max' => 'Surname is too long!',
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }


        $master->name = $request->master_name;
        $master->surname = $request->master_surname;
        $master->save();
        return redirect()->route('master.index')->with('success_message', 'Changed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function destroy(Master $master)
    {

        if($master->masterOutfits->count()){
            // return 'Trinti negalima, nes yra priskirtu automobiliu';
            return redirect()->back()->with('info_message', 'There are some assigned Outfits. The master can not be deleted!');
        }
        $master->delete();
        return redirect()->route('master.index')->with('info_message', 'master was deleted!');
      
    }
}
