<?php
    if (!function_exists('getIconHtml')) {
        function getIconHTML($iconName, $width = 24, $height = 24)
        {
            // Define the folder name for SVG images within the public directory
            $folderName = 'svg-icons';

            // Construct the SVG filename based on the icon name
            $svgFileName = $iconName . '.svg';

            // Create the HTML <img> tag with the src attribute pointing to the SVG file
            $imgTag = '<img src="' . asset($folderName . '/' . $svgFileName) . '" width="' . $width . '" height="' . $height . '" alt="' . $iconName . '">';

            return $imgTag;
        }
    }
