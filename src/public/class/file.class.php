<?php

class File {

    private $fileExtension;
    private $fileName;
    private $fileLocation;
    private $fileSize;
    public function __construct( array $file){
        $this->fileName=$fileName;
        $this->fileExtension=pathinfo($fileName,'PATHINFO_EXTENSION');
        $this->fileLocation=$file['tmp_name'];
        $this->fileSize=$file['size']; 
    } 


    public static function checkIfExtensionIsAllowed(array $ext){
        if( in_array($this->fileExtension,$ext))
           return true;
        return false; 
    }



    public function setUniqueFileName(){
        $this->fileName=uniqid().$this->fileExtension;
    }


    public function getFileLocation(){
        return $this->$fileLocation;
    }
    public function getFileName(){
        return $this->$fileName;
    }
    public function getExtension(){
        return $this->fileExtention;
    }

}


