# this api is used to convert a pdf file to html in a simple way 

## Requirements
1. Poppler-Utils (if you are using Ubuntu Distro, just install it from apt )
```bash
`sudo apt-get install poppler-utils`
```
## usage 
```php

<?php
require_once('class/ConvertFile.class.php');
// if you are using composer, just use this
include '/var/www/html/api/convertPdfHtml/vendor/autoload.php';


if($_SERVER['REQUEST_METHOD'] === 'POST'){

  $toFileUpload=array(
    "file"=>$_FILES['fileToUpload'],
    // if you want set a unique name for your file to avoid losing data
    'uniqueName'=>true,
   // serverDownloadDir it's the input for the converter 
    "serverDownloadDir"=>'/var/www/html/api/convertPdfHtml/input/',
    // where html code is downloaded
    "htmlOutputDir"=>'/var/www/html/api/convertPdfHtml/output',
    // allowed extention in ower case only pdf
   "allowedExtention"=>['pdf'],cdc
  
);
  $upload=new fileUpload($toFileUpload);
  $upload->uploadfile();
  $converter=new Convert($upload);
  $converter->convert($toFileUpload['htmlOutputDir']);
  $converter->returnHtml();
}
?>
`̀`̀ 
