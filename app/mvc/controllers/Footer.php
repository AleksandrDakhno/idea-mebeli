<?php
    //echo 'Footer.php';

    class Footer extends MainView {
        
        private $aTPL_Footer = array();
        
        protected function TPLtoArray($path){
            $aTPL = file($path);
            foreach ($aTPL as $sLine){
                if(substr_count($sLine, 'HEADER_IMAGE') > 0){
                    $this->TPL_Footer[] = str_replace('HEADER_IMAGE', HEADER_IMAGE, $sLine);
                } else if(substr_count($sLine, 'HEADER_MENU') > 0) {
                    $this->makeMenu();
                } else {
                    $this->aTPL_Footer[] = $sLine;
                }
            }
            
            return $this->aTPL_Footer;
        }
    }
?>
