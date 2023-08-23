<?php

    use Carbon\Carbon;

    if (!function_exists('getConvertedDate')) {

        function getConvertedDate($datetime)
        {
            return date('Y-m-d', strtotime($datetime));
        }
    }
    if (!function_exists('getPromotionalDate')) {

        function getPromotionaldDate($datetime)
        {
            return date('d/m/Y', strtotime($datetime));
        }
    }
    if (!function_exists('formatDate')) {

        function formatDate($date)
        {
            return Carbon::parse($date)->format('d/m/Y');
        }
    }
