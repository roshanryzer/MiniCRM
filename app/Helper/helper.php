<?php

function findLogo($image, $name)
{
    if (is_file(public_path('storage/companies/thumbnails/'.$image))) {
        return '<img src="' . asset('storage/companies/thumbnails/'.$image) . '" title="' . $name . '" alt="' . $name . '">';
    } else {
        return '<img src="' . asset('assets/images/no_image.jpg') . '" title="' . $name . '" alt="' . $name . '">';
    }
}
