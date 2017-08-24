<?php

/**
 * Created by PhpStorm.
 * User: maria
 * Date: 24/8/17
 * Time: 6:56 PM
 */
class FileUploader
{
    public $path;
    public $filename;
    private $width;
    private $height;
    public $resolutionError;

    public function __construct()
    {
        $this->resolutionError = 0;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }


    /**
     * @return mixed
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @param mixed $filename
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    public function resolution($files, $key = null) {
        if ($key != NULL) {
            $imageResolution = getimagesize($files[$key]["tmp_name"]);

            $width           = $imageResolution[0];
            $height          = $imageResolution[1];
            if (($height != $this->getHeight()) || ($width != $this->getWidth())) {
                $this->resolutionError = 1;
                return false;
            }
        } else {
            foreach ($files as $file) {
                $imageResolution = getimagesize($file['tmp_name']);

                $width           = $imageResolution[0];
                $height          = $imageResolution[1];
                if (($height != $this->getHeight()) || ($width != $this->getWidth())) {
                    $this->resolutionError = 1;
                    return false;
                }
            }
        }
    }


    /**
     * File uploading..
     * @param $files
     * @param $key - upload using particular key
     * @return bool
     */
    public function uploadAndReturnFile($files, $key = NULL)
    {
        if ($key != NULL) {

            $upload_dir = _DIR_ . "/../uploads/{$this->path}/";
            $filename = basename($files[$key]["name"]);
            $file_explode = explode('.', basename($filename));
            $ext = end($file_explode);
            $renamedFile = TagdToUtils::getUniqueId() . '.' . $ext;
            $target_file = $upload_dir . $renamedFile;

            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            if (move_uploaded_file($files[$key]["tmp_name"], $target_file)) {
                $this->filename = $renamedFile;
                return $this->filename;

            } else {
                return false;
            }
        }
    }
    public function upload($files, $key = NULL) {
        if (!$this->path) {
            return false;
        }

        $imageArray=array();

        if ($key != NULL) {

            $upload_dir   = dirname(__FILE__). "/../uploads/{$this->path}/";
            $filename     = basename($files[$key]["name"]);
            $file_explode = explode('.', basename($filename));
            $ext          = end($file_explode);
            $renamedFile  = TagdToUtils::getUniqueId(). '.'. $ext;
            $target_file  = $upload_dir.$renamedFile;

            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            if (move_uploaded_file($files[$key]["tmp_name"], $target_file)) {
                $this->filename = $renamedFile;
                return true;

            } else {
                return false;
            }

        } else {
            foreach ($files as $file) {
                $upload_dir   =  dirname(__FILE__). "/../uploads/{$this->path}/";
                $filename     = basename($file["name"]);
                $file_explode = explode('.', basename($filename));
                $ext          = end($file_explode);
                $renamedFile  = TagdToUtils::getUniqueId(). '.'. $ext;
                $target_file  = $upload_dir.$renamedFile;

                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }

                if (move_uploaded_file($file["tmp_name"], $target_file)) {
                    $this->filename = $renamedFile;

                    $imageArray[]=$this->filename;
                } else {

                }
            }
        }

        return $imageArray;
    }

    /**
     * For deleting the uploaded file
     * @return bool
     */
    public function deleteFile() {
        if (!empty($this->getFilename())) {
            $filePath = _DIR_. "/../uploads/{$this->getPath()}/{$this->getFilename()}";

            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        return true;
    }
}