<?php

class fileUpload 
{

    private $tempDirectory;
    private $fileExtension;
    private $fileName;
    private $fileUploadLocation; 

    function  __construct(array $file, boolean $UniqueName=false){
        $this->fileExtension=pathinfo($this->fileName,PATHINFO_EXTENSION);
        $this->tempDirectory=$file['tmp_name'];
        if($UniqueName==true){
            $this->fileName=uniqid().$this->fileExtention;
        }
        else
        $this->fileName=$file['name'];
    }


    
    public function setDestination(string $UploadLocation) {
        $this->fileUploadLocation=UploadLocation;
    }


    // upload the file == move from tmp to the given directory 

    public function uploadfile(array $allowedExtention){
        // verify extention 
        if( in_array($this->fileExtension,allowedExtention)){
            move_uploaded_file($tempDirectory,$fileUploadLocation.$this->fileName);
            return true;
        }
        else {
            throw new Exception("extention not allowed", 1);
            return false;
        }

    }


  
    

}
?>