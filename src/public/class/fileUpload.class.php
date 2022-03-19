<?php
require_once('file.class.php');

class fileUpload extends File 
{


    private $fileUploadLocation; 

    function  __construct(array $file,$UniqueName=false){
        parent::__construct($file);
        if($UniqueName==true){
            parent::setUniqueFileName();
        }
    }


    
    public function setDestination(string $UploadLocation) {
        $this->fileUploadLocation=$UploadLocation;
    }


    // upload the file == move from tmp to the given directory 

    public function uploadfile(array $allowedExtention){
        // verify extention 
        if(parent::checkIfExtensionIsAllowed($allowedExtention)){
            move_uploaded_file(parent::getFileLocation(),$this->fileUploadLocation.$this->getfileName());
            
        }
        else {
            throw new Exception("extention not allowed", 1);
        }

    }
public function getFileUploadLocation(){
    return $this->fileUploadLocation;
}

  
    

}
?>