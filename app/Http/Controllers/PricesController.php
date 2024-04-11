<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\CreatePricesRequest;
    use App\Http\Requests\UpdatePricesRequest;
    use App\Models\Price;
    use App\Models\SeasonPrices;
    use Carbon\Carbon;
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
            $seasonPrices = SeasonPrices::all();
            $price_promotional = Price::all('promotional_price');
            $start_promotional = Price::all('start_promotional_date');
            $end_promotional = Price::all('end_promotional_date');
            return view('admin', compact('prices','seasonPrices'));
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
        public function showSeasonPrices($price_id)
        {
            $price = SeasonPrices::find($price_id);
            return response()->json($price);
        }
        public function storeSeasonPrices(Request $request)
        {
            $prices = SeasonPrices::create($request->input());
            return response()->json($prices);
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
            if ($price->end_promo_date && Carbon::now() > $price->end_promo_date) {
                $price->promotional_price = null;
                $price->start_promotional_date = null;
                $price->end_promotional_date = null;
            } else {
                // Update promotional fields
                $price->promotional_price = $request->promotional_price;
                $price->start_promotional_date = $request->start_promotional_date;
                $price->end_promotional_date = $request->end_promotional_date;
            }
            $price->save();
            return response()->json($price);
        }

        public function updateSeasonPrices($price_id, Request $request){
            $price = SeasonPrices::find($price_id);
            $price->count_days = $price_id;
            $price->month_1 = $request->month_1;
            $price->month_2 = $request->month_2;
            $price->month_3 = $request->month_3;
            $price->month_4 = $request->month_4;
            $price->month_5 = $request->month_5;
            $price->month_6 = $request->month_6;
            $price->month_7 = $request->month_7;
            $price->month_8 = $request->month_8;
            $price->month_9 = $request->month_9;
            $price->month_10 = $request->month_10;
            $price->month_11 = $request->month_11;
            $price->month_12 = $request->month_12;
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
