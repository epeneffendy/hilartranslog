<?php

class Helper
{
    function upload_image($file, $path)
    {
        $config['upload_path'] = './assets/img/upload';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['max_size'] = '2048';  //2MB max
        $config['max_width'] = '4480'; // pixel
        $config['max_height'] = '4480'; // pixel
        $config['file_name'] = $path . '-' . $file['name'];
        return $config;
    }
}