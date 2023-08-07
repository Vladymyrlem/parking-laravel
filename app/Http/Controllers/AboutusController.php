<?php

    namespace App\Http\Controllers;

    use App\Models\AboutUs;
    use Illuminate\Http\Request;

    class AboutusController extends Controller
    {
        public function storeAboutAsBlock(Request $request)
        {

            $product = AboutUs::create($request->input());
            return response()->json($product);
        }

        public function getAboutAsBlock(Request $request)
        {
            return view('admin');

        }

        public function showAboutAsBlock($aboutus_id)
        {
            $aboutus = AboutUs::find($aboutus_id);
            return response()->json($aboutus);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function updateAboutAsBlock(Request $request, $aboutus_id)
        {
            $data = $request->all();
            // Decode the URL-encoded data
            $decodedContent = urldecode($data['content']);
            $aboutus = AboutUs::findOrFail($aboutus_id);
            $aboutus->title = $request->title;

            $aboutus->content = $decodedContent;
            $aboutus->save();
            return response()->json($aboutus);
        }
    }
