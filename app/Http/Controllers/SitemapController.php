<?php

    namespace App\Http\Controllers;

    use App\Models\Contacts;
    use App\Models\HeadBlock;
    use App\Models\Information;
    use App\Models\Price;
    use App\Models\Prices;
    use App\Models\Reviews;
    use App\Models\Services;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;

    class SitemapController extends Controller
    {
        /**
         * Write code on Method
         *
         * @return Response()
         */
        public function index(): Response
        {
            $prices = Price::all();
            $headBlocks = HeadBlock::all();
            $information = Information::all();
            $reviews = Reviews::all();
            $contacts = Contacts::all();
            $services = Services::all();

            return response()->view('sitemap', [
                'prices' => $prices,
                'headBlocks' => $headBlocks,
                'information' => $information,
                'reviews' => $reviews,
                'contacts' => $contacts,
                'services' => $services
            ])->header('Content-Type', 'text/xml');
        }
    }
