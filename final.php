<?php

// Define strategy (contain or cover)
// $strategy = 'contain'; // Can be either 'contain' or 'cover'

function getOutPut($imageA, $imageB, $strategy){
  if ($strategy == 'contain') {

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
    $imageB['width'] = (int) round($imageB['width']);
    $imageB['height'] = (int) round($imageB['height']);

    // Display results
    return "(" . $strategy . "): width:" . $imageA['width'] . " x height: " . $imageA['height'] . "\n";
  } else {

     $output =  getCoverDimensions($imageA, $imageB);
     return "(" . $strategy . "): ". $output;

  }
}


function getCoverDimensions($imageA, $imageB) {

    $output = [];

    // Determine the larger width and height values between the two images
    $max_width = max($imageA['width'], $imageB['width']);
    $max_height = max($imageA['height'], $imageB['height']);

    // If both images have equal or greater width and height, use those values
    if ($imageA['width'] >= $max_width && $imageA['height'] >= $max_height &&
        $imageB['width'] >= $max_width && $imageB['height'] >= $max_height) {
        $output['width'] = $max_width;
        $output['height'] = $max_height;
    }
    // Otherwise, use the larger width and height values from each image separately
    else {
        $output['width'] = max($imageA['width'], $imageB['width']);
        $output['height'] = max($imageA['height'], $imageB['height']);
    }
    // Output the result as a string with the format "w: WIDTH h: HEIGHT"
    // return "width: {$output['width']} height: {$output['height']}";
    return "width: ". $output['width']." x height: ". $output['height'];
}

// Define image dimensions
$imageA = array('width' => 250, 'height' => 500);
$imageB = array('width' => 500, 'height' => 90);

$output = getOutPut($imageA, $imageB, "contain");
echo $output.'<br>';

$output = getOutPut($imageA, $imageB, "cover");
echo $output.'<br>';

// Input: imageA = W: 180, H: 250, imageB = W: 360, H: 200
$output = match_image_dimensions(['width' => 180, 'height' => 250], ['width' => 360, 'height' => 200]);
echo $output.'<br>';
// Output: w: 360 h: 250

// Input: imageA = W: 180, H: 250, imageB = W: 100, H: 500
$output = match_image_dimensions(['width' => 180, 'height' => 250], ['width' => 100, 'height' => 500]);
echo $output.'<br>';
// Output: w: 180 h: 500

// Input: imageA = W: 180, H: 250, imageB = W: 150, H: 245
$output = match_image_dimensions(['width' => 180, 'height' => 250], ['width' => 150, 'height' => 245]);
echo $output.'<br>';
// Output: w: 180 h: 250

// Input: imageA = W: 250, H: 500, imageB = W: 500, H: 90
$output = match_image_dimensions(['width' => 250, 'height' => 500], ['width' => 500, 'height' => 90]);
echo $output.'<br>';
// Output: w: 500 h: 500