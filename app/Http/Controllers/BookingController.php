<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Booking::orderBy('id', 'DESC')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //added sleep for testing loading
        sleep(1);
        $request->validate([
            'name' => 'required|string',
            'book_date' => 'required|date_format:Y-m-d',
            'book_time' => 'required|date_format:H:i',
            'message' => 'required|string',
        ]);
        $booking = Booking::create($request->all());
        return response()->json(['success' => true, 'booking' => $booking]);
    }
}
