<?php
require_once('file.class.php');

class fileUpload extends File 
{


    private $fileUploadLocation; 
    private $allowedExtention;


    function  __construct(array $param){
        parent::__construct($param['file']);
        $this->allowedExtention=$param['allowedExtention'];
        $this->fileUploadLocation=$param['serverDownloadDir'];
        if($param['uniqueName']==true){
            parent::setUniqueFileName();
        }
    }


    
    public function setDestination(string $UploadLocation) {
        $this->fileUploadLocation=$UploadLocation;
    }


    // upload the file == move from tmp to the given directory 

    public function uploadfile(){
        // verify extention 
        if(parent::checkIfExtensionIsAllowed($this->allowedExtention)){
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