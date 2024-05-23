<?php

namespace App\Templates;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class MobileSlider implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(500, 150);
    }
}
