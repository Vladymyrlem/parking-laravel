<?php

    use App\Models\SectionTitle;

    /**
     * Write code on Method
     *
     * @return \Illuminate\Http\Response
     */

    if (!function_exists('getTitleBySlug')) {
        function getTitleBySlug($slug)
        {
            // Retrieve the 'title' column value based on the provided 'slug'
            $title = SectionTitle::where('slug', $slug)->value('title');
            // You can now use the $title variable for further processing or return it in your response
            return $title;
        }
    }
