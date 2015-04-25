<?php
    //echo 'MainView.php';

    class MainView{
        protected $path;
        
        //public functions
        
        public function __construct($path) {
            $this->path = $path;
        }
        
        public function run(){
            $this->printTPL($this->path);
        }

        public static function showArray($aArray){
            echo '<pre>';
            print_r($aArray);
            echo '</pre>';
        }
        
        // private functions
        
        protected function printTPL($path){
            //получаем массив шаблона
            $aTPL = $this->TPLtoArray($path);
            //$this->showArray($aTPL);
            foreach ($aTPL as $sLine){
                echo $sLine;
            }
        }
        
        protected function TPLtoArray($path){
            return file($path);
        }
        
        protected function pushTPLtoArray($path){
            $aTPL = file($path);
            $array = array();
            foreach ($aTPL as $sLine){
                $array[] = $sLine;
            }       
            return $array;
        }
        
    }

?>
