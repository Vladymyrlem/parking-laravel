<?php

    namespace App\Http\Controllers;

    use App\Models\Contacts;
    use Illuminate\Http\Request;

    class KontaktsController extends Controller
    {
        public function storeContact(Request $request)
        {
            $contact = Contacts::create($request->input());
            return response()->json($contact);
        }

        public function getContact(Request $request)
        {
            return view('admin');

        }

        public function showContact($contact_id)
        {
            $contact = Contacts::find($contact_id);
            return response()->json($contact);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param int $contact_id
         * @return \Illuminate\Http\Response
         */
        public function updateContact(Request $request, $contact_id)
        {
            $contact = Contacts::find($contact_id);
            $contact->contacts_title = $request->contacts_title;
            $contact->email = $request->email;
            $contact->address = $request->address;
            $contact->phone_number_1 = $request->phone_number_1;
            $contact->phone_number_2 = $request->phone_number_2;
            $contact->latitude = $request->latitude;
            $contact->longitude = $request->longitude;
            $contact->map_link = $request->map_link;
            $contact->save();
            return response()->json($contact);
        }
    }
