<?php

namespace infrastructure;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class FileService
{

    protected $image_path;

    public function __construct()
    {
        $this->image_path = Config::get('images.upload_path');
    }

    /**
     * Generate new name for uploaded file.
     */
    public function makeName($file = null, $url = null)
    {

        //Returns file name with extension if method contains a file in parameters
        if (!($file == null)) {
            return md5(date('yyyy-mm-dd hh:ss') . $file . rand(0, 999)) . '.' . $file->getClientOriginalExtension();
        }

        //Returns file name with extension if method contains a url in parameters
        if (!($url == null)) {
            return md5(date('yyyy-mm-dd hh:ss') . $file . rand(0, 999)) . '.' . $this->getExt($url);
        }

        //Returns file name without extension if the $file parameter is null
        return md5(date('yyyy-mm-dd hh:ss') . $file . rand(0, 999));
    }

    public function getExt($file)
    {
        $ext = pathinfo($file, PATHINFO_EXTENSION);

        if (strpos($ext, '?')) {
            return substr($ext, 0, strpos($ext, "?"));
        } else {
            return $ext;
        }
    }
}