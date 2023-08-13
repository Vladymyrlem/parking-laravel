<?php

    use App\Models\SectionTitle;
    use App\Models\Content;
    use Illuminate\Support\Facades\DB;

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
    if (!function_exists('getContentBySlug')) {
        function getContentBySlug($slug)
        {
            // Retrieve the 'content' column value based on the provided 'slug'
            $content = Content::where('slug', $slug)->value('content');
            // You can now use the $title variable for further processing or return it in your response
            return $content;
        }
    }
    if (!function_exists('getSubtitleBySlug')) {
        function getSubtitleBySlug($slug)
        {
            // Retrieve the 'title' column value based on the provided 'slug'
            $subtitle = SectionTitle::where('slug', $slug)->value('subtitle');
            // You can now use the $title variable for further processing or return it in your response
            return $subtitle;
        }
    }
    if (!function_exists('getContact')) {
        function getContact($name)
        {
            // Retrieve the 'title' column value based on the provided 'slug'
            $contact = DB::table('contacts')->value($name);

            // You can now use the $title variable for further processing or return it in your response
            return $contact;
        }
    }

