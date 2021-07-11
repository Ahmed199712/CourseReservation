<?php

use App\Message as message;
use App\Reservation as reservation;

if( !function_exists('aurl') ){
    function aurl($url = null){
        return url('admin/' . $url);
    }
}


if( !function_exists('admin') ){
    function admin(){
        return auth()->guard('admin')->user();
    }
}

if( !function_exists('getContact') ){
    function getContact($type = 'data'){
        if( $type == 'data' ){
            $contact = message::where('status' , 0)->orderBy('created_at','desc')->get();
        }else{
            $contact = message::where('status' , 0)->count();
        }
        return $contact;
    }
}

if( !function_exists('getReservation') ){
    function getReservation($type = 'data'){
        if( $type == 'data' ){
            $reservation = reservation::where('status' , 0)->orderBy('created_at','desc')->get();
        }else{
            $reservation = reservation::where('status' , 0)->count();
        }
        return $reservation;
    }
}