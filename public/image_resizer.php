<?php

require('auth.php');


ini_set('display_errors', false);

error_reporting(-1);

// set_error_handler(function($errno, $errstr, $errfile, $errline, $errcontext) {
    //error was suppressed with the @-operator
    // if (0 === error_reporting()) {
        // return false;
    // }

    // throw new Exception('Plik jest nieobsługiwany albo zbyt duży (dopuszczalny rozmiar do '.ini_get('post_max_size').').');
// });

try {

  if (!isset($_FILES['image']) || !isset($_FILES['image']['tmp_name']))
    throw new Exception('Plik jest nieobsługiwany albo zbyt duży (dopuszczalny rozmiar do '.ini_get('post_max_size').').');

  else {
    $file = $_FILES['image']['tmp_name'];
    $sourceProperties = getimagesize($file);
    
    if (!in_array($sourceProperties[2], array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP)))
      throw new Exception('Nieobsługiwany typ pliku.');

    else {
      $width = $sourceProperties[0];
      $height = $sourceProperties[1];
      $targetWidth;
      $targetHeight;
      if ($width < $height) {
        $targetHeight = 600;
        $targetWidth = round(600*$width/$height);
      } else {
        $targetHeight = round(800*$height/$width);
        $targetWidth = 800;
      }
      switch ($sourceProperties[2]) {
        case IMAGETYPE_PNG:
          $imageResourceId = imagecreatefrompng($file); 
          break;
        case IMAGETYPE_GIF:
          $imageResourceId = imagecreatefromgif($file);
          break;
        case IMAGETYPE_JPEG:
          $imageResourceId = imagecreatefromjpeg($file);
          break;
        case IMAGETYPE_BMP:
          $imageResourceId = imagecreatefrombmp($file);
          break;
      }
      $targetLayer = imagecreatetruecolor($targetWidth,$targetHeight);
      imagefill($targetLayer, 0, 0, imagecolorallocate($targetLayer, 255, 255, 255));
      imagesetinterpolation($targetLayer, IMG_BSPLINE);
      imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight,$width,$height);
      imagedestroy($imageResourceId);
      $imageUrl = 'upload/'.date('d.m.Y-H.i.s.').gettimeofday()['usec'].'.jpg';
      touch($imageUrl);
      imagejpeg($targetLayer, $imageUrl, 100);
      imagedestroy($targetLayer);
      echo json_encode(array(
        'imageUrl' => $imageUrl,
        'ok' => true
      ));
    }
  }
} catch (Exception $e) {
  echo json_encode(array(
    'message' => $e->getMessage(),
    'ok' => false
  ));
}
?>