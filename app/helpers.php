<?php

use Illuminate\Support\Facades\Http;

if (!function_exists('imageExists')) {
    function imageExists($url)
    {
        try {
            $response = Http::withOptions(['verify' => false])->get($url);
            return $response->successful() && str_contains($response->header('Content-Type'), 'image');
        } catch (\Exception $e) {
            return false;
        }
    }
}