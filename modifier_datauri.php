<?php

function smarty_modifier_datauri($url) {

    $filename = "cache/image1.jpg";
    @file_put_contents($filename, file_get_contents($url) );

    $ret = sprintf(
        "data: %s;base64,%s",
        "image/jpg",
        base64_encode(file_get_contents($filename))
    );

    return( $ret );
}
