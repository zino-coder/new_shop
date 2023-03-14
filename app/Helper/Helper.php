<?php

use Illuminate\Support\Facades\Storage;

if (!function_exists('moveImageToFolder')) {
    function moveImageToFolder($file, $folder)
    {
        Storage::disk('local')->move('tmp/uploads/' . $file, 'public/uploads/' . $folder . '/' . $file);
    }
}
