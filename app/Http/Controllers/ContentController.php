<?php

    namespace App\Http\Controllers;

    use App\Models\Content;
    use Illuminate\Http\Request;

    class ContentController extends Controller
    {
        /**
         * Display a listing of the Prices.
         *
         * @param Request $request
         *
         * @return \Illuminate\Http\Response
         */
        public function index(Request $request)
        {
            $content = Content::all();
            return view('admin', compact('content'));
        }

        /**
         * Store a newly created Prices in storage.
         *
         * @param Request $request
         *
         * @return \Illuminate\Http\Response
         */
        public function storeContent(Request $request)
        {
            $content = $request->input('content');
            $slug = $request->input('slug');

            // Assuming you have a model and database table to save the data
            $textContent = new Content();
            $textContent->content = urldecode($content);
            $textContent->slug = $slug;
            $textContent->save();
            return response()->json($textContent);
        }


        /**
         * Display the specified Prices.
         *
         * @param int $content_id
         *
         * @return \Illuminate\Http\Response
         */
        public function showContent($content_id)
        {
            $content = Content::find($content_id);
            return response()->json($content);
        }

        /**
         * Update the specified Prices in storage.
         *
         * @param int $id
         * @param Request $request
         *
         * @return \Illuminate\Http\Response
         */
        public function updateContent($content_id, Request $request)
        {
            $data = $request->all();

            // Decode the URL-encoded data
            $decodedContent = urldecode($data['content']);
            $decodedSlug = $data['slug'];
            $textContent = Content::findOrFail($content_id);
            $textContent->content = $decodedContent;
            $textContent->slug = $decodedSlug;
            // Assuming you have a model and database table to save the data
            $textContent->save();
            return response()->json($textContent);
        }


        /**
         * Remove the specified contents from storage.
         *
         * @param int $content_id
         *
         * @return \Illuminate\Http\Response
         * @throws \Exception
         *
         */
        public function destroyContent($content_id)
        {
            $content = Content::destroy($content_id);
            return response()->json($content);
        }
    }
