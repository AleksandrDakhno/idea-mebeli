<?php

    class XML{
        public static function xmlToArrayMenu($path){
            $aXML = simplexml_load_file($path);
            
            $aReturn = array();
            
            foreach ($aXML as $aProperties){
                $aReturn[(string)$aProperties->name]['title'] = (string)$aProperties->title;
                $aReturn[(string)$aProperties->name]['img'] = (string)$aProperties->img;
            }
            
            return $aReturn;
        }
        
        public static function xmlToArrayCatalog( $xmlFile ){
            $xml = simplexml_load_file( $xmlFile );
      
            $aCatalogMenu = array();

            foreach( $xml->product as $key => $catalog ) {
                $name = (string)$catalog->name;
                $aCatalogMenu[ $name ]['url'] = (string)$catalog->url;
                $aCatalogMenu[ $name ]['rus_name'] = (string)$catalog->rus_name;
            }
            
            return $aCatalogMenu;
        }
        
        public static function xmlToArrayProduct( $xmlFile ){
            $xml = simplexml_load_file( $xmlFile );
      
            $aProduct = array();
            $name = (string)$xml->name;
            $aProduct[ $name ]['title'] = (string)$xml->title;
            $aProduct[ $name ]['shema_text'] = (string)$xml->shema_text;
            $aProduct[ $name ]['razmer_text'] = (string)$xml->razmer_text;

            return $aProduct;
        }
        
    }
?>
