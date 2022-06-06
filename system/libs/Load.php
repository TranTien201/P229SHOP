<?php
    class Load
    {
        public function __construct()
        {
            
        }

        public function view($fileName, $data = false)
        {
            if($data == true)
            {
                extract($data);
            }
            include('apps/view/'.$fileName.'.php');
        }

        public function model($fileName)
        {
            include('apps/model/'.$fileName.'.php');
            return new $fileName();
        }
    }
?>