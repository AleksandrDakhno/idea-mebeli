<?php

    //echo 'Header.php';

    class Header extends MainView{
        private $aTPL_Header = array();
        
        protected function TPLtoArray($path){
            $aTPL = file($path);
            foreach ($aTPL as $sLine){
                if(substr_count($sLine, 'HEADER_IMAGE') > 0){
                    $this->aTPL_Header[] = str_replace('HEADER_IMAGE', HEADER_IMAGE, $sLine);
                } else if(substr_count($sLine, 'HEADER_MENU') > 0) {
                    $this->makeMenu();
                } else {
                    $this->aTPL_Header[] = $sLine;
                }
            }
            
            return $this->aTPL_Header;
        }
        
        private function makeMenu(){
            $aXML = XML::xmlToArrayMenu(XML_HEADER_MENU);
            $i = 1;
            foreach( $aXML as $name => $item ){
                //echo $name;
                $this->aTPL_Header[] = '<div id="menuItem'.$i.'">';
                if($name == 'divan' || $name == 'mjagkiy'){
                    $this->aTPL_Header[] = '<img id="new_model" src="public/images/new/new_model.png" width="100px">';
                }
                $this->aTPL_Header[] = '<a href="?catalog='.$name.'"><img class="menuTitle" src="'.$item['title'].'"></a>';
                $this->aTPL_Header[] = '<a href="?catalog='.$name.'"><img class="menuImage" src="'.$item['img'].'"></a>';
                $this->aTPL_Header[] = '</div>';
                $i++;
            }
        }

    }
?>