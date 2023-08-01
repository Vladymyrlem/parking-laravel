<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\CreatePricesRequest;
    use App\Http\Requests\UpdatePricesRequest;
    use App\Models\Price;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Response;

    class PricesController extends Controller
    {
        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware('auth');
        }

        /**
         * Display a listing of the Prices.
         *
         * @param Request $request
         *
         * @return \Illuminate\Http\Response
         */
        public function index(Request $request)
        {
            $prices = Price::all();
            return view('admin', compact('prices'));
        }

        /**
         * Store a newly created Prices in storage.
         *
         * @param Request $request
         *
         * @return \Illuminate\Http\Response
         */
        public function storePrices(Request $request)
        {
            $prices = Price::create($request->input());
            return response()->json($prices);
        }

        /**
         * Display the specified Prices.
         *
         * @param int $price_id
         *
         * @return \Illuminate\Http\Response
         */
        public function showPrices($price_id)
        {
            $price = Price::find($price_id);
            return response()->json($price);
        }

        /**
         * Update the specified Prices in storage.
         *
         * @param int $id
         * @param Request $request
         *
         * @return \Illuminate\Http\Response
         */
        public function updatePrices($price_id, Request $request)
        {
            $price = Price::find($price_id);
            $price->count_days = $request->count_days;
            $price->standart_price = $request->standart_price;
            $price->promotional_price = $request->promotional_price;
            $price->start_promotional_date = $request->start_promotional_date;
            $price->end_promotional_date = $request->end_promotional_date;
            $price->save();
            return response()->json($price);
        }

        /**
         * Remove the specified Prices from storage.
         *
         * @param int $price_id
         *
         * @return \Illuminate\Http\Response
         * @throws \Exception
         *
         */
        public function destroyPrices($price_id)
        {
            $price = Price::destroy($price_id);
            return response()->json($price);
        }
    }
