<?php 
require_once('file.class.php');
use Wbrframe\PdfToHtml\Converter\ConverterFactory;
use Wbrframe\PdfToHtml\Converter\PopplerUtils\PdfToHtmlOptions;
class Convert {

    private $outputfolder;
    private $outputFilePath;
    private $option;
    private $upload ;
    public function __construct(fileUpload $upload)
    {   
        $this->upload=$upload;
        
    }


public function convert($Path){
$this->setOutPut($Path);
$this->setOption();
// initiate
$converterFactory = new ConverterFactory($this->upload->getFileLocation());
$converter = $converterFactory->createPdfToHtml($this->options);
$converter->createHtml();

}

private function setOption(){
    $this->options = (new PdfToHtmlOptions())
    ->setBinPath('/usr/bin/pdftohtml')
    ->setOutputFolder($this->outputfolder)
    ->setOutputFilePath($this->outputFilePath);
}

public function setOutPut(string $Path){
    $this->outputfolder=$Path;
    $this->outputFilePath=$Path.$this->upload->getFileName();


}



}