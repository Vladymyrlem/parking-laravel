<?php

    namespace App\Http\Controllers;

    use App\Models\Newsletter;
    use Illuminate\Http\Request;
    use Lunaweb\RecaptchaV3\Facades\RecaptchaV3;

    class NewsletterController extends Controller
    {
        public function storeNewsletter(Request $request)
        {
            $newsletter = Newsletter::create($request->input());
            $response = RecaptchaV3::verify(request('recaptcha_token'));
            if ($response->isSuccess()) {
                return response()->json($newsletter);
            } else {
                return response()->json(['error' => 'reCAPTCHA verification failed'], 422);
            }

        }

        public function getNewsletter(Request $request)
        {
            return view('admin');

        }

        public function showNewsletter($newsletter_id)
        {
            $newsletter = Newsletter::find($newsletter_id);
            return response()->json($newsletter);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param int $newsletter_id
         * @return \Illuminate\Http\Response
         */
        public function updateNewsletter(Request $request, $newsletter_id)
        {
            $newsletter = Newsletter::find($newsletter_id);
            $newsletter->title = $request->title;
            $newsletter->subtitle = $request->subtitle;
            $newsletter->approval_rodo = $request->approval_rodo;
            $newsletter->approval_title = $request->approval_title;
            $newsletter->approval_subtitle = $request->approval_subtitle;
            $newsletter->save();
            return response()->json($newsletter);
        }
    }
