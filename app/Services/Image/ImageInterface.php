<?php
namespace App\Services\Image;


interface ImageInterface
{
    public function getContainImage($imageA, $imageB);

    public function getCoverImage($imageA, $imageB);
}
