<?php

use Image;
use Illuminate\Support\Facades\Storage;

function SaveImageDir($file,$dimension,$dir): string{
    $img = Image::make($file);
  
    $resize = $img->fit($dimension)->encode($file->extension());

    $hash = md5($resize->__toString().now());

    $path = $dir.'/'.$hash.'.'.$file->extension();

    $path_file = Storage::disk('public')->put($path,$resize->__toString());

    return $hash.'.'.$file->extension();
}