<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Car;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\BookingRequest;
use Carbon\Carbon;


class CarController extends Controller
{
    public function index(Request $request)
    {
        $cars = Car::where('status',1);
        
        return view('frontend.car.index');
    }

    public function show()
    {
        return view('frontend.car.show');  
    }


    public function store(BookingRequest $request)
    {
        $hari_berangkat = $request->input('hari_berangkat'); 
        $jam_berangkat = $request->input('jam_berangkat'); 
    
        $jam_berangkat_full = $hari_berangkat; 
        $hari_pulang = $request->input('hari_pulang'); 
        $jam_pulang = $request->input('jam_pulang'); 
    
        $jam_pulang_full = $hari_pulang;
    
        
        Booking::create([
            'RENTAL_NO' => $request->input('RENTAL_NO'),
            'RENTAL_DATE' => $request->input('RENTAL_DATE'),
            'RENTAL_TIME' => $request->input('RENTAL_TIME'),
            'RENTAL_DIV' => $request->input('RENTAL_DIV'),
            'PLANT_CD' => $request->input('PLANT_CD'),
            'USER_ID' => $request->input('USER_ID'),
            'USER_NM' => $request->input('USER_NM'),
            'USER_EMPID' => $request->input('USER_EMPID'),
            'USER_DEPT_CD' => $request->input('USER_DEPT_CD'),
            'USER_DEPT_NM' => $request->input('USER_DEPT_NM'),
            'RENTAL_TYPE_CD' => $request->input('RENTAL_TYPE_CD'),
            'RENTAL_ACTIVITY_CD' => $request->input('RENTAL_ACTIVITY_CD'),
            'RENTAL_PLACE_CD' => $request->input('RENTAL_PLACE_CD'),
            'RENTAL_PLACE_DESC' => $request->input('RENTAL_PLACE_DESC'),
            'RENTAL_EMP_QTY' => $request->input('RENTAL_EMP_QTY'),
            'RENTAL_APPROV_YN' => $request->input('RENTAL_APPROV_YN'),
            'PLAN_START_TIME' => $jam_berangkat_full,
            'PLAN_END_TIME' => $jam_pulang_full,
            'PLAN_DURATION_HH' => $request->input('PLAN_DURATION_HH'),
            'PREPARED_YN' => $request->input('PREPARED_YN'),
            'OUTGOING_YN' => $request->input('OUTGOING_YN'),
            'CANCEL_YN' => $request->input('CANCEL_YN'),
            'FINISH_YN' => $request->input('FINISH_YN'),
            'RENTAL_STATUS' => $request->input('RENTAL_STATUS'),
            'DATA_MEMO' => $request->input('DATA_MEMO'),
            'EXTRA1_FLD' => $request->input('EXTRA1_FLD'),
            'EXTRA2_FLD' => $request->input('EXTRA2_FLD'),
            'EXTRA3_FLD' => $request->input('EXTRA3_FLD'),
            'EXTRA4_FLD' => $request->input('EXTRA4_FLD'),
            'EXTRA5_FLD' => $request->input('EXTRA5_FLD'),
            'CREATOR' => $request->input('CREATOR'),
            'CREATE_DT' => now(),
            'CREATE_PC' => $request->input('CREATE_PC'),
            'UPDATER' => $request->input('UPDATER'),
            'UPDATE_DT' => now(),
            'UPDATE_PC' => $request->input('UPDATE_PC')
        ]);
    
        
        if (auth()->user()->is_admin) {
            return redirect()->route('admin.bookings.index')->with([
                'message' => 'Booking berhasil dibuat!',
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->route('user.bookings.index')->with([
                'message' => 'Kami akan menghubungi Anda secepatnya!',
                'alert-type' => 'success'
            ]);
        }
    }
}    
