@props(['width' => 90, 'height' => 90, 'employer'])
<img src="{{ asset($employer->logo) }}" alt="employer logo" class=" rounded-xl" width="{{ $width }}">
