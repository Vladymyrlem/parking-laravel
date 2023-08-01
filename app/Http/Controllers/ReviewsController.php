<?php

    namespace App\Http\Controllers;

    use App\Models\Reviews;
    use Illuminate\Http\Request;

    class ReviewsController extends Controller
    {
        public function storeReview(Request $request)
        {

            $review = Reviews::create($request->input());
            return response()->json($review);
        }

        public function getReview(Request $request)
        {
            return view('admin');

        }

        public function showReview($review_id)
        {
            $review = Reviews::find($review_id);
            return response()->json($review);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function updateReview(Request $request, $review_id)
        {
            $data = $request->all();

            // Decode the URL-encoded data
            $decodedContent = urldecode($data['content']);
            $decodedAuthor = urldecode($data['author']);

            // Now you can save the decoded data to the database
            // Assuming you have an Eloquent model called 'YourModel' representing your database table
            $item = Reviews::findOrFail($review_id);
            $item->content = $decodedContent;
            $item->author = $decodedAuthor;
            $item->save();

            // Return a response or redirect as needed
            // For example, if you're returning a JSON response:
            return response()->json(['message' => 'Data updated successfully']);
        }

        public function destroyReview($review_id)
        {
            $review = Reviews::destroy($review_id);
            return response()->json($review);
        }
    }
