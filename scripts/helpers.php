<?php
function Clean_Text ($string) {
    $string = strip_tags($string);
    $string = str_replace('&', '&amp;', $string);
    $string = str_replace('<', '&lt;', $string);
    $string = str_replace('>', '&gt;', $string);
    $string = str_replace('"', '&quot;', $string);
    $string = str_replace("'", '&apos;', $string);
    $string = str_replace("\\", '&#92;', $string);
    $string = str_replace("\n", '<br>', $string);

    return $string;
}
?>