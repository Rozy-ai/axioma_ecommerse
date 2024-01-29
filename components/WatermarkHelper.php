<?php

namespace app\components;

use Imagine\Image\Box;
use Imagine\Image\Point;
use Imagine\Gd\Imagine;
//use yii\imagine\Image;
use yii\imagine\Image;

class WatermarkHelper
{
    public static function addWatermarkAndSaveToNewFolder($sourceFolderPath, $targetFolderPath, $watermarkPath)
    {
        $imagine = new Imagine();

        if (!file_exists($targetFolderPath)) {
            mkdir($targetFolderPath, 0755, true);
        }

        $watermark = $imagine->open($watermarkPath);

        $files = glob($sourceFolderPath . '/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
        // $files = array_slice($files, 14, 15);
 
        foreach ($files as $file) {
            $image = $imagine->open($file);
            $size = $image->getSize();
           // var_dump($size);die;
            $originalWidth = Image::getImagine()->open($file)->getSize()->getWidth();
           // var_dump($originalWidth);die;
     
            // $watermark = $watermark->resize($size);
            $watermarkSize = $watermark->getSize();

            // // Check if the watermark size is larger than the image size
            // if ($watermarkSize->getWidth() > $size->getWidth() || $watermarkSize->getHeight() > $size->getHeight()) {
            //     // Resize the watermark to fit within the image dimensions
            //     $watermark = $watermark->resize($size);
            //     $watermarkSize = $watermark->getSize();
            // } else {
                $watermark = Image::resize($watermark, $originalWidth, null, true, true);
            // }
         //   var_dump($watermark->getSize());die;

            // Calculate the position to center the watermark on the full-size image
            //$position = new Point($image->getSize()->getWidth(), 0);
           // $position = new Point(($size->getWidth() - $watermarkSize->getWidth()) / 2, ( $watermarkSize->getHeight()) / 2);           
            $position = new Point(0, 0);
            //  $image->paste($watermark, $position);
            $image->paste($watermark, $position);
            $newFilePath = $targetFolderPath . '/' . basename($file);
            $image->save($newFilePath);
        }
    }
}