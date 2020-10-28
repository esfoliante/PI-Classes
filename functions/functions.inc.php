<?php

$supported_types = array('image/jpeg', 'image/png', 'image/gif');

// ? pp stands for "power_print"
// ? and it will handle printing an array 
function pp($array)
{
    return "<pre> $array </pre>";
}

// ? in this function we will upload the file to our folder
// ? which the default is simply 'upload'
function upload_image($file, $types = $supported_types, $folder = 'upload', $max_upload_size = 10000000)
{

    // ? in the next line we will be checking for errors
    if(!file['error']) {
        // ? and then, with this if we check the upload information such as file types
        // ? and file size
        if($file['size'] <= $max_upload_size && in_array($file['type'], $types)) {
            // ? now, we will handle the formatting of the name with teh format_image function
            $file_info = pathinfo($file['name']);
            $file_name = format_image($file_info);

            // ? and, to finish of, we move the temporary file to the permanent location
            move_uploaded_file($file['tmp_name'], $folder . '/' . $file_name);

            // ? then we simply return the filename so that we can store it in our csv
            return $file_name;
        }
    }

    return false;

}

// ? in this function we will format the file name according
// ? to the indications the teacher gave us
function format_file($name, $file_info) {

    // ? this is simply the format we will be using
    $name = $file_info['filename'].'_'.uniqid().'.'.$file_info['extension'];

    // ? and we return the formatted name
    return $name;

}