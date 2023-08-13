<?php

    namespace App\Http\Controllers;

    use App\Models\Information;
    use HTMLPurifier_Config;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\File;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Facades\Validator;
    use HTMLPurifier;

    class InformationController extends Controller
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
            $information = Information::all();
            return view('admin', compact('information'));
        }

        /**
         * Store a newly created Prices in storage.
         *
         * @param Request $request
         *
         * @return \Illuminate\Http\Response
         */
        public function storeInformation(Request $request)
        {
            $description = $request->input('description');
            $media = $request->input('media');
            // Assuming you have a model and database table to save the data
            $yourModel = new Information();
            $yourModel->description = $description;
            $yourModel->media = $media;
            $yourModel->save();
            return response()->json($yourModel);
        }

        /**
         * Display the specified Prices.
         *
         * @param int $info_id
         *
         * @return \Illuminate\Http\Response
         */
        public function showInformation($info_id)
        {
            $info = Information::find($info_id);
            return response()->json($info);
        }

        /**
         * Update the specified Prices in storage.
         *
         * @param int $id
         * @param Request $request
         *
         * @return \Illuminate\Http\Response
         */
        public function updateInformation($info_id, Request $request)
        {
            $yourModel = Information::find($info_id);
            $yourModel->description = $request->description;
            $yourModel->media = $request->media;
            // Assuming you have a model and database table to save the data

            $yourModel->save();
            return response()->json($yourModel);
        }

        /**
         * Remove the specified infos from storage.
         *
         * @param int $info_id
         *
         * @return \Illuminate\Http\Response
         * @throws \Exception
         *
         */

        public function destroyInformation($info_id)
        {
            $info = Information::destroy($info_id);
            return response()->json($info);
        }

    }
