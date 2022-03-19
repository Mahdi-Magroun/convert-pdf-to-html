<?php

class File {

    private $fileExtension;
    private $fileName;
    private $fileLocation;
    private $fileSize;

    public function __construct( array $file){
        $this->fileName=$file['name'];
        $this->fileExtension=pathinfo($this->fileName,PATHINFO_EXTENSION);
        $this->fileLocation=$file['tmp_name'];
        $this->fileSize=$file['size']; 
    } 


    public function checkIfExtensionIsAllowed(array $ext){
       return in_array($this->fileExtension,$ext);
    }



    public function setUniqueFileName(){
        $this->fileName=uniqid().$this->fileExtension;
    }


    public function getFileLocation(){
        return $this->fileLocation;
    }
    public function getFileName(){
        return $this->fileName;
    }
    public function getExtension(){
        return $this->fileExtention;
    }

}


