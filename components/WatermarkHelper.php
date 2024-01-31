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
       // $files = array_slice($files, 100, 779); //779
        // var_dump($files);die;

 
        foreach ($files as $file) {
            $image = $imagine->open($file);
            $size = $image->getSize();
           // var_dump($size);die;
            $originalWidth = Image::getImagine()->open($file)->getSize()->getWidth();
            $originalHeight = Image::getImagine()->open($file)->getSize()->getHeight();
           // var_dump($originalWidth);die;
     
            // $watermark = $watermark->resize($size);
            $watermarkSize = $watermark->getSize();

            // // Check if the watermark size is larger than the image size
            // if ($watermarkSize->getWidth() > $size->getWidth() || $watermarkSize->getHeight() > $size->getHeight()) {
            //     // Resize the watermark to fit within the image dimensions
            //     $watermark = $watermark->resize($size);
            //     $watermarkSize = $watermark->getSize();
            // } else {
                // $watermark = Image::resize($watermark, $originalWidth, null, true, true);
            // }
         //   var_dump($watermark->getSize());die;

            // Calculate the position to center the watermark on the full-size image
            //$position = new Point($image->getSize()->getWidth(), 0);
           // $position = new Point(($size->getWidth() - $watermarkSize->getWidth()) / 2, ( $watermarkSize->getHeight()) / 2);  
        //    if ($watermarkSize->getWidth() > $size->getWidth()) {
        //        $watermark = Image::resize($watermark, $originalWidth, null, true, true);
        //        $position = new Point(0, 0);
        //    } else {
        //        $position = new Point(($size->getWidth() - $watermarkSize->getWidth()) / 2, 0);
        //    }

            
        // if($size->getWidth() == 1400 && $size->getHeight() == 1400){
        //     $watermark = Image::resize($watermark, 1000, 700, true, true); 
        //     $watermarkSize = $watermark->getSize();
        // } elseif ($size->getWidth() == 1200 && $size->getHeight() == 800){
        //     $watermark = Image::resize($watermark, 900, 600, true, true);
        //     $watermarkSize = $watermark->getSize();
        // } elseif ($size->getWidth() == 1050 && $size->getHeight() == 700){
        //     $watermark = Image::resize($watermark, 800, 500, true, true);
        //     $watermarkSize = $watermark->getSize();
        // }elseif ($size->getWidth() == 1066 && $size->getHeight() == 1400){
        //     $watermark = Image::resize($watermark, 800, 500, true, true);
        //     $watermarkSize = $watermark->getSize();
        // } else {
        //     continue;
        // }

        $watermark = Image::resize($watermark, (($size->getWidth()/100)*60), null, true, true);
        $watermarkSize = $watermark->getSize();
        $position = new Point(($size->getWidth() - $watermarkSize->getWidth()) / 2, ($size->getHeight() - $watermarkSize->getHeight()) / 2);


            // if($size->getWidth() == 1400 && $size->getHeight() == 933){
            //     $watermark = Image::resize($watermark, 1000, 1000, true, false);
            //     $watermarkSize = $watermark->getSize();
            //     $position = new Point(($size->getWidth() - $watermarkSize->getWidth()) / 2, 40);
            // } else {
            // if ($size->getWidth() > 1400) {
            //     if ($size->getHeight() < 933) {
            //         $watermark = Image::resize($watermark, null, $originalHeight, true, true);
            //         $watermarkSize = $watermark->getSize();
            //     }
            //     $position = new Point(($size->getWidth() - $watermarkSize->getWidth()) / 2, ($size->getHeight() - $watermarkSize->getHeight()) / 2);
            //    }  else {
            //     $watermark = Image::resize($watermark, $originalWidth, null, true, true);
            //     $watermarkSize = $watermark->getSize();
            //     if ($watermarkSize->getHeight() < $size->getHeight()) {
            //         $position = new Point(0, ($size->getHeight() - $watermarkSize->getHeight()) / 2);
            //        }  else {
            //            $position = new Point(0, 0);
            //        }
            //    }
            // }

                //resize image
                // $newFilePath = $targetFolderPath . '/' . basename($file);
                // $newSize = new \Imagine\Image\Box(1400, 933); // New width and height
                // $image->resize($newSize)->save($newFilePath, ['quality' => 90]);

            //  $image->paste($watermark, $position);
            $image->paste($watermark, $position);
            $newFilePath = $targetFolderPath . '/' . basename($file);
            $image->save($newFilePath);
        }
    }
}