<?php

    namespace App\Http\Controllers;

    use App\Models\Parking;
    use Illuminate\Http\Request;

    class ParkingController extends Controller
    {
        public function storeParking(Request $request)
        {
            $parking = Parking::create($request->input());
            return response()->json($parking);
        }

        public function getParking(Request $request)
        {
            return view('admin');

        }

        public function showParking($parking_id)
        {
            $parking = Parking::find($parking_id);
            return response()->json($parking);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param int $parking_id
         * @return \Illuminate\Http\Response
         */
        public function updateParking(Request $request, $parking_id)
        {
            $parking = Parking::find($parking_id);
            $parking->title = $request->title;
            $parking->subtitle = $request->subtitle;
            $parking->approval_rodo = $request->approval_rodo;
            $parking->approval_title = $request->approval_title;
            $parking->approval_subtitle = $request->approval_subtitle;
            $parking->save();
            return response()->json($parking);
        }
    }
