<?php

namespace App\Http\Controllers\AdminControllersFolder;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Floor;
use Validator;

class FloorController extends Controller
{
   
    public function index()
    {
        $floors = Floor::latest()->get();
        return view('admin.floors.index' , compact('floors'));
    }

   
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        $validate = Validator::make( $request->all() , [
            'number' => 'required|unique:floors',
            'name' => 'required|unique:floors',
        ] , [] );

        if( $validate->passes() ){

            $floor = new Floor;
            $floor->number = $request->number;
            $floor->name = $request->name;
            $floor->save();

            return response()->json($floor);



        }else{
            return response()->json(['errors' => $validate->errors()->all()]);
        }
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit(Request $request)
    {
        $id = $request->id;

        $floor = Floor::findOrFail($id);

        return response()->json($floor);
    }

    
    public function update(Request $request)
    {

        $id = $request->floorID;

        $validate = Validator::make( $request->all() , [
            'number' => 'required|unique:floors,number,'.$id,
            'name' => 'required|unique:floors,name,'.$id,
        ] , [] );

        if( $validate->passes() ){

            $floor = Floor::findOrFail($id);
            $floor->number = $request->number;
            $floor->name = $request->name;
            $floor->save();

            return response()->json($floor);



        }else{
            return response()->json(['errors' => $validate->errors()->all()]);
        }
    }

    
    public function destroy(Request $request)
    {
        $id = $request->id;
        $floor = Floor::findOrFail($id);
        $floor->delete();


        return response()->json($floor);
    }


    public function getAll(){
        $floors = Floor::latest()->get();

        return view('admin.floors.getAll' , compact('floors'));
    }

    



}
