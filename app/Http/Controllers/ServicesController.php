<?php

    namespace App\Http\Controllers;

    use App\Models\Services;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Log;

    class ServicesController extends Controller
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
            $information = Services::all();
            return view('admin', compact('information'));
        }

        /**
         * Store a newly created Prices in storage.
         *
         * @param Request $request
         *
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            try {
                $serviceId = $request->id;
                $service_title = $request->input('service-title');
                $description = $request->input('service-content');
                if ($request->hasFile('image')) {
                    // Image was uploaded, proceed with saving
                    $imagePath = $request->file('image')->storePublicly('images', 'custom');

                    // Extract the filename from the stored path
                    $imageName = basename($imagePath);
                } else {
                    // Image was not uploaded, handle the situation (e.g., display an error message)
                    // For example:
                    return response()->json(['error' => 'No image uploaded'], 400);
                }

                // Save the file path to the database
                $service = new Services();
                $service->service_title = $service_title;
                $service->service_content = $description;
                $service->image = 'images/' . $imageName;
                $service->save();
                return response()->json(['message' => 'Post saved successfully', 'file_name' => $imageName]);
            } catch (\Exception $e) {
                // Log the error or display a detailed error message for debugging
                Log::error($e->getMessage());
                return response()->json(['error' => 'Internal Server Error'], 500);
            }


        }


        /**
         * Display the specified Prices.
         *
         * @param int $service_id
         *
         * @return \Illuminate\Http\Response
         */
        public function show($service_id)
        {
            $info = Services::find($service_id);
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
        public function update($service_id, Request $request)
        {
            $service = Services::findOrFail($request->id);
            $service->service_title = $request->service_title;
            $service->image = $request->image;
            $service->service_content = $request->service_content;

            // Assuming you have a model and database table to save the data

            $service->save();
            return response()->json($service);
        }

        public function edit($id)
        {
            $post = Services::findOrFail($id);

            return response()->json($post);
        }

        /**
         * Remove the specified infos from storage.
         *
         * @param int $service_id
         *
         * @return \Illuminate\Http\Response
         * @throws \Exception
         *
         */
        public function destroy($service_id)
        {
            $info = Services::destroy($service_id);
            return response()->json($info);
        }

        public function uploadIcon(Request $request)
        {
            $imgpath = request()->file('image')->store('uploads', 'public');
            return response()->json(['location' => "/storage/$imgpath"]);
        }
    }
