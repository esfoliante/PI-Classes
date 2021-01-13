<?php
/**
 *  ! Code by: Miguel Ferreira
 *  ! github: www.github.com/esfoliante 
 */

// ! NOTE: To better read this code it's recommended for you to install the "BETTER COMMENTS" extension

$supported_types = array('image/jpeg', 'image/png', 'image/gif');

// ? pp stands for "power_print"
// ? and it will handle printing an array 
function pp($array)
{
    return "<pre> $array </pre>";
}

// ? in this function we will upload the file to our folder
// ? which the default is simply 'upload'
function upload_image($file, $types = null, $folder = 'upload', $max_upload_size = 10000000)
{

    if(check_integrity($file)) {

        // ? now, we will handle the formatting of the name with teh format_image function
        $file_info = pathinfo($file['name']);
        $file_name = format_image($file_info);

        // ? and, to finish of, we move the temporary file to the permanent location
        move_uploaded_file($file['tmp_name'], $folder . '/' . $file_name);

        // ? then we simply return the filename so that we can store it in our csv
        return $file_name;

    }

    return false;

}

// ? in this function we will upload the file to our folder
// ? which the default is simply 'upload'
function upload_file($file, $types = null, $folder = 'upload', $max_upload_size = 50000000)
{

    if(check_integrity($file)) {

        // ? now, we will handle the formatting of the name with teh format_image function
        $file_info = pathinfo($file['name']);
        $file_name = format_image($file_info);

        // ? and, to finish of, we move the temporary file to the permanent location
        move_uploaded_file($file['tmp_name'], $folder . '/' . $file_name);

        // ? then we simply return the filename so that we can store it in our csv
        return $file_name;

    }

    return false;

}

// ? in this function we will format the file name according
// ? to the indications the teacher gave us
function format_file($file_info) {

    // ? this is simply the format we will be using
    $name = $file_info['filename'].'_'.uniqid().'.'.$file_info['extension'];

    // ? and we return the formatted name
    return $name;

}

// ? in the following function we will check if the file is valid
// ? to be uploaded to our folder or not
function check_integrity($file) {

    global $supported_types;

    if($types == null) $types = $supported_types;

    // ? in the next line we will be checking for errors
    if(!$file['error']) {
        // ? and then, with this if we check the upload information such as file types
        // ? and file size
        if($file['size'] <= $max_upload_size && in_array($file['type'], $types)) {

            return true;

        }
    }

    return false;

}