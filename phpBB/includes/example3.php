<?php
/**
 * SLtxt2PNG.php -- create a PNG image from Sensei's Library diagram format
 * Copyright (C) 2001-2009 by
 * Arno Hollosi <ahollosi@xmp.net>, Morten Pahle <morten@pahle.org.uk>
 *
 * Call this file with following parameters:
 * http://your.domain/example.php?type=PNG
 * http://your.domain/example.php?type=thumb
 * http://your.domain/example.php?type=SGF
 */

require 'sltxt2png.php';

/**
 * Demo function generating board position of ear-reddening move
 * including a link to Sensei's Library
 * @param string $type One of PNG, thumb, SGF
 */

function workPlease($string)
{

$type = 'PNG';
$diagramsrc = $string;

    $diagram = new GoDiagram($diagramsrc);
    if ($diagram->isValid()) {  // check that parsing was ok
        switch ($type) {
            case 'PNG':
                $png = new GoDiagramPNG($diagram);
                $img = $png->createPNG();
                Header("Content-type: image/png");
                ImagePng($img);	    // just output the image
                ImageDestroy($img);
                break;
            case 'thumb':
                $png = new GoDiagramPNG($diagram);
                $thumb = $png->createThumbnail();
                Header("Content-type: image/jpeg");
                ImageJPEG($thumb);
                ImageDestroy($thumb);
                break;
            case 'SGF':
                $sgf = new GoDiagramSGF($diagram, 'http://127.0.0.1/phpbb3/sgf/examples.php');
                $sgfdata = $sgf->createSGF();
                Header("Content-type: application/x-go-sgf");
                echo $sgfdata;
                break;
            default:
                echo "Unknown type passed in. Please use ?type=PNG or ?type=thumb or ?type=SGF";
                break;
        }
    }

}

?>

 <img src="example3.php?type=PNG" alt="diagram" width="<?php echo $width; ?>" height="<?php echo $height; ?>">