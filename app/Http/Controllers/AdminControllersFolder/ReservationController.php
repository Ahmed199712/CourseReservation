<?php

namespace App\Http\Controllers\AdminControllersFolder;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reservation;
use App\User;

class ReservationController extends Controller
{

    public function index()
    {
        $reservations = Reservation::latest()->get();

        return view('admin.reservations.index' , compact('reservations'));
    }

 
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        $reservation = Reservation::find($id);
        $reservation->status = 1;
        $reservation->save();

        return view('admin.reservations.show' , compact('reservation'));
    }

   
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();

        $userID = $reservation->user->id;
        
        $user = User::find($userID);
        $user->register_course = 0;
        $user->save();

        session()->flash('success' , 'Reservation Deleted Successfully...');
        return redirect()->route('reservations.index');
    }


    public function active($id)
    {
        $reservation = Reservation::find($id);
        $reservation->active = 1;
        $reservation->save();

        session()->flash('success' , 'Reservation Accepted Successfully...');
        return redirect()->back();
    }
}
