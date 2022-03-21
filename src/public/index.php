<?php
require_once('class/ConvertFile.class.php');
// if you are using composer, just use this
include '/var/www/html/api/convertPdfHtml/vendor/autoload.php';


if($_SERVER['REQUEST_METHOD'] === 'POST'){

  $toFileUpload=array(
    "file"=>$_FILES['fileToUpload'],
    'uniqueName'=>true,
   // serverDownloadDir it's the input for the converter 
    "serverDownloadDir"=>'/var/www/html/api/convertPdfHtml/input/',
    "htmlOutputDir"=>'/var/www/html/api/convertPdfHtml/output',
   "allowedExtention"=>['pdf'],
  
);
  $upload=new fileUpload($toFileUpload);
  $upload->uploadfile();
  $converter=new Convert($upload);
  $converter->convert($toFileUpload['htmlOutputDir']);
  $converter->returnHtml();
}



?>