<?php

function checkFile($path)
{

    if (!file_exists($path)) {
        $file = fopen($path, 'a+');
        fputs($file, "Nome;Email;Ano;Sexo;Disciplinas Inscritas;Observações\n");

        return $file;
    }


    $file = fopen($path, 'a');
    return $file;
}

function checkUpload($file, $arrTypes = array('image/png', 'image/jpeg', 'image/gif'), $max_upload_size = 10000000)
{

    if ($file['error'] != 0) {
        header("location: ../pages/error.php?error=Error uploading file");
        die();
    }

    if (in_array($file['type'], $arrTypes) && $file['size'] <= $max_upload_size) {
        $fileinfo = pathinfo($file['name']);
        $filename = '../upload/' . $file['name'] . '_' . uniqid() . '.' . $fileinfo['extension'];

        move_uploaded_file($file['tmp_name'], $filename);
    } else {
        header("location: ../pages/error.php?error=File is not valid");
        die();
    }

    return $filename;

}

function writeData($file)
{

    $disciplinas = [
        $_POST['português'],
        $_POST['linges'],
        $_POST['filosofia'],
        $_POST['edf'],
        $_POST['matematica'],
        $_POST['fqa'],
        $_POST['med'],
        $_POST['ai'],
        $_POST['fac'],
        $_POST['tp'],
        $_POST['iebd'],
        $_POST['pi'],
        $_POST['tdm'],
        $_POST['pt'],
        $_POST['fct'],
    ];
    $disciplinasInscritas = [];

    foreach ($disciplinas as $disciplina) {
        if (isset($disciplina))
            array_push($disciplinasInscritas, $disciplina);
    }

    $disciplinasInscritas = implode(";", $disciplinasInscritas);

    $filename = checkUpload($_FILES['picture']);

    $data = $_POST['nome'] . ";" . $_POST['email'] . ";" . $_POST['ano'] . ";" . $_POST['sexo'] . ";" . $disciplinasInscritas . ";" . $_POST['observacoes'] . ";" . $filename . "\n";

    fputs($file, $data);
}



$path = '../utils/data.csv';

writeData(checkFile($path));
header("location: ../pages/show.php");
