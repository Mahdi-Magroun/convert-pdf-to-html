<?php

use Wbrframe\PdfToHtml\Converter\ConverterFactory;
use Wbrframe\PdfToHtml\Converter\PopplerUtils\PdfToHtmlOptions;

// if you are using composer, just use this
include '/var/www/html/api/convertPdfHtml/vendor/autoload.php';
?>

<!DOCTYPE html>
<html>
<body>

<form action="index.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
<?php

if(isset($_POST['submit'])){



    $targetFile= "/var/www/html/api/convertPdfHtml/input/".$_FILES['fileToUpload']['name'];
    move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$targetFile);
    echo $targetFile;



$options = (new PdfToHtmlOptions())
    ->setBinPath('/usr/bin/pdftohtml')
    ->setOutputFolder('/var/www/html/api/convertPdfHtml/output')
    ->setOutputFilePath('/var/www/html/api/convertPdfHtml/output/'.$_FILES['fileToUpload']['name']);
;
// initiate
$converterFactory = new ConverterFactory($targetFile);
$converter = $converterFactory->createPdfToHtml($options);
$html = $converter->createHtml();
}
/**
 * mvc : structure 
 * 
 */
?>
