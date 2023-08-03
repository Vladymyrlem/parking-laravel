<?php

    namespace App\Http\Controllers;

    use App\Models\SectionTitle;
    use Illuminate\Http\Request;

    class SectionTitleController extends Controller
    {
        public function storeSectionTitle(Request $request)
        {
            $sectiontitle = SectionTitle::create($request->input());
            return response()->json($sectiontitle);
        }

        public function getSectionTitle(Request $request)
        {
            return view('admin');

        }

        public function showSectionTitle($sectiontitle_id)
        {
            $sectiontitle = SectionTitle::find($sectiontitle_id);
            return response()->json($sectiontitle);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function updateSectionTitle(Request $request, $sectiontitle_id)
        {
            $sectiontitle = SectionTitle::find($sectiontitle_id);
            $sectiontitle->title = $request->title;
            $sectiontitle->subtitle = $request->subtitle;
            $sectiontitle->slug = $request->slug;
            $sectiontitle->save();
            return response()->json($sectiontitle);
        }

        public function destroySectionTitle($sectiontitle_id)
        {
            $sectiontitle = SectionTitle::destroy($sectiontitle_id);
            return response()->json($sectiontitle);
        }
    }
