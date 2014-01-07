<?php

// Either use an image on your server or point to something fun.
// This will be used if there is an error requesting the data
// from Instagram.
$error_image = 'http://distilleryimage3.s3.amazonaws.com/86cf0db877dc11e38302122de019cc27_8.jpg';

// Get your access token at http://blog.pixelunion.net/instagram
$access_token = '206005842.fdaeaee.402f409181de48b4831fde5f4760ef9c';

$data = json_decode(file_get_contents("https://api.instagram.com/v1/users/self/feed?access_token=$access_token&count=1"))->data;
header("Location: " . ($data ? $data[0]->images->low_resolution->url : $error_image));
