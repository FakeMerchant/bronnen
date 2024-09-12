<?php
$dir = "static/banners/";
$images = array();
if ($handle = scandir($dir)) {
        foreach ($handle as $target) {
                if (!in_array($target, [".", ".."])) {
                        $images[] = $target;
                }
        }
}
shuffle($images);
header("Location: {$dir}{$images[0]}");
?>
