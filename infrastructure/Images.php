<?php

namespace infrastructure;

use App\Models\Image;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use infrastructure\Facades\FileFacade;
use Intervention\Image\ImageManager;

class Images
{

    protected $image_path;

    public function __construct()
    {
        $this->image_path = public_path(Config::get('images.upload_path'));
    }

    /**
     * Upload the uploaded file to specific path.
     */
    public function up($file, $thumb_sizes)
    {
        $renamed_uploaded_file = FileFacade::makeName($file);

        if ($file->move($this->image_path . '/', $renamed_uploaded_file)) {

            foreach ($thumb_sizes as $size) {
                $this->saveThumb($renamed_uploaded_file, $size);
            }

            return $this->makeObject($renamed_uploaded_file);
        }
    }

    public function getThumbSize($size_type)
    {
        return Config::get('images.' . $size_type);
    }

    /**
     * save image thumbnail
     */
    public function saveThumb($file, $size_type)
    {
        $manager = new ImageManager(array('driver' => Config::get('images.driver')));
        $image = $manager->make($this->image_path . '/' . $file);
        $size = $this->getThumbSize($size_type);

        /**
         * resize image with maintaining aspect ratio
         */
        if ($image->getWidth() > $image->getHeight()) {
            $image->resize(null, $size['height'], function ($image) {
                $image->aspectRatio();
            });
            $image->crop($size['width'], $size['height'], intval(($image->getWidth() - $size['width']) / 2), 0);
        } else {
            $image->resize($size['width'], null, function ($image) {
                $image->aspectRatio();
            });
            $image->crop($size['width'], $size['height'], 0, intval(($image->getHeight() - $size['height']) / 2));
        }

        if (!file_exists($this->image_path . '/thumb')) {
            File::makeDirectory($this->image_path . '/thumb');
        }

        if (!file_exists($this->image_path . '/thumb/' . $size['width'] . 'x' . $size['height'])) {
            File::makeDirectory($this->image_path . '/thumb/' . $size['width'] . 'x' . $size['height']);
        }

        $image->save($this->image_path . '/thumb/' . $size['width'] . 'x' . $size['height'] . '/' . $file);
    }

    /**
     * Store many of images provided as an array
     * Returns stored image names
     */
    public function store($images, $thumb_sizes)
    {
        $response = [];
        $status = false;
        $created_images = [];
        $error = null;

        if ($images != null) {
            if (is_array($images)) {
                foreach ($images as $image) {
                    $file = $this->up($image, $thumb_sizes);

                    array_push($created_images, $file);
                }
            } else {
                $created_images = $this->up($images, $thumb_sizes);
            }

            $status = true;
        } else {
            $error = "Please add at least one image to upload";
        }

        $response['status'] = $status;
        $response['error'] = $error;
        $response['created_images'] = $created_images;

        return $response;
    }

    /**
     * Create Image object and store in database
     */
    public function makeObject($new_image_name)
    {
        $image_service = new Image();

        $image = $image_service::create(['name' => $new_image_name]);

        return $image;
    }
}

