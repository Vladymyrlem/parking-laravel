<?php
    if (!function_exists('getConvertedDate')) {

        function getConvertedDate($datetime)
        {
            return date('Y-m-d', strtotime($datetime));
        }
    }
