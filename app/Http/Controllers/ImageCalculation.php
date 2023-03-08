<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageSizeValidationRequest;
use App\Services\Image\ImageInterface;
use Illuminate\Http\Request;

class ImageCalculation implements ImageInterface
{
    public function index(ImageSizeValidationRequest $request)
    {

        // Define image dimensions
//        $imageA = array('width' => 250, 'height' => 500);
//        $imageB = array('width' => 500, 'height' => 90);
        $imageA = array('width' => $request->image_a_width, 'height' => $request->image_a_height);
        $imageB = array('width' => $request->image_b_width, 'height' => $request->image_b_height);

        $contain = $this->getContainImage($imageA, $imageB);
        $cover = $this->getCoverImage($imageA, $imageB);

        return view('calculation.index', with([
            'contain' => $contain,
            'cover' => $cover,
        ]));
    }

    public function getContainImage($imageA, $imageB)
    {
        // Calculate aspect ratios of images
        $aspectRatioA = $imageA['width'] / $imageA['height'];
        $aspectRatioB = $imageB['width'] / $imageB['height'];

        // Contain strategy
        if ($aspectRatioB > $aspectRatioA) {

            // ImageB is wider than imageA, so adjust height
            $imageB['height'] = $imageA['height'];
            $imageB['width'] = $imageB['height'] * $aspectRatioB;
        } else {

            // ImageB is taller than or equal to imageA, so adjust width
            $imageB['width'] = $imageA['width'];
            $imageB['height'] = $imageB['width'] / $aspectRatioB;
        }
        $imageB['width'] = (int)round($imageB['width']);
        $imageB['height'] = (int)round($imageB['height']);

        // Display results
        return "(Contain): width:" . $imageA['width'] . " x height: " . $imageA['height'] . "\n";
    }

    public function getCoverImage($imageA, $imageB)
    {
        $output = [];

        // Determine the larger width and height values between the two images
        $max_width = max($imageA['width'], $imageB['width']);
        $max_height = max($imageA['height'], $imageB['height']);

        // If both images have equal or greater width and height, use those values
        if ($imageA['width'] >= $max_width && $imageA['height'] >= $max_height &&
            $imageB['width'] >= $max_width && $imageB['height'] >= $max_height) {
            $output['width'] = $max_width;
            $output['height'] = $max_height;
        } // Otherwise, use the larger width and height values from each image separately
        else {
            $output['width'] = max($imageA['width'], $imageB['width']);
            $output['height'] = max($imageA['height'], $imageB['height']);
        }
        // Output the result as a string with the format "w: WIDTH h: HEIGHT"
        // return "width: {$output['width']} height: {$output['height']}";
        return "(Cover): width: " . $output['width'] . " x height: " . $output['height'];
    }
}
