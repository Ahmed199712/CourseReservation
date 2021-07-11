<?php

namespace App\Http\Controllers\AdminControllersFolder;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classe;
use App\Floor;
use Validator;

class ClasseController extends Controller
{
    
    public function index()
    {
        $classes = Classe::latest()->get();
        return view('admin.classes.index' , compact('classes'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $validate = Validator::make( $request->all() , [
            'number' => 'required|unique:classes',
            'name' => 'required|unique:classes',
            'floor_id' => 'required',
        ] , [] );

        if( $validate->passes() ){

            $classe = new Classe;
            $classe->number = $request->number;
            $classe->name = $request->name;
            $classe->floor_id = $request->floor_id;
            $classe->save();

            return response()->json($classe);



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

        $classe = Classe::findOrFail($id);

        return response()->json($classe);
    }

    
    public function update(Request $request)
    {

        $id = $request->classID;

        $validate = Validator::make( $request->all() , [
            'number' => 'required|unique:classes,number,'.$id,
            'name' => 'required|unique:classes,name,'.$id
        ] , [] );

        if( $validate->passes() ){

            $classe = Classe::findOrFail($id);
            $classe->number = $request->number;
            $classe->name = $request->name;
            $classe->floor_id = $request->floor_id;
            $classe->save();

            return response()->json($classe);



        }else{
            return response()->json(['errors' => $validate->errors()->all()]);
        }
    }

   
    public function destroy(Request $request)
    {
        $id = $request->id;
        $classe = Classe::findOrFail($id);
        $classe->delete();


        return response()->json($classe);
    }


    public function getAll(){
        $classes = Classe::latest()->get();
        return view('admin.classes.getAll' , compact('classes'));
    }


    public function getAllFloors(Request $request)
    {
        $floors = Floor::all();

        return view('admin.classes.getAllFloors' , compact('floors'));
    }

    public function getSelectedFloor(Request $request)
    {
        $id = $request->classID;

        $floors = Floor::all();

        $class = Classe::findOrFail($id);

        return view('admin.classes.getSelectedFloors' , compact('floors','class','id'));
    }


}
