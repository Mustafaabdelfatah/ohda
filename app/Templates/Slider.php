<?php

namespace App\Templates;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Slider implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(1200, 350);
    }
}