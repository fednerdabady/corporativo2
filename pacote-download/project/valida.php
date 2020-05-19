<?php

$reqGet = filter_input(INPUT_GET, "file",FILTER_DEFAULT);
function Inputheader($Filename, $Filepath){
    header("content-disposition: inline; filename = {$Filename}");
    header("content-type: application/pdf");
    readfile($Filepath);
}
switch ($reqGet){
    case "1":
        $Filename = "Holerite.pdf";
        $Filepath = "upload/{$Filename}";
        Inputheader($Filename, $Filepath);
        break;
    case "2":
        $Filename = "Imposto de renda2.pdf";
        $Filepath = "upload/{$Filename}";
        Inputheader($Filename, $Filepath);
        break;
}
//$pasta = 'upload';
//if(isset($_GET['file']) && file_exists("{$pasta}/".$_GET['file'])){
//    $file = $_GET['file'];
//    $type = filetype("{$pasta}/{$file}");
//    $size = filesize("{$pasta}/{$file}");
//    header("Content-Description: File Transfer ");
//    header("Content-Type: {$type}");
//    header("Content-Length: {$size}");
//    header("Content-Disposition: attachment; filename=$file");
//    readfile("{$pasta}/{$file}");
//    exit;
//}

