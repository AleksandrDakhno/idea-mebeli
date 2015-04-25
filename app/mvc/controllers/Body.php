<?php
    //echo 'Body.php';

    class Body extends MainView{
        
        private $aTPL_Body = array();
        
        protected function TPLtoArray($path){
            $aTPL = file($path);
            foreach ($aTPL as $sLine){
                if(substr_count($sLine, 'BODY_LEFT') > 0){
                    $this->makeLeft();
                } else if(substr_count($sLine, 'BODY_RIGHT') > 0) {
                    $this->makeRight();
                } else {
                    $this->aTPL_Body[] = $sLine;
                }
            }
            
            return $this->aTPL_Body;
        }
        
        private function makeLeft(){
    
            if(!isset($_GET['catalog'])){
                if(!isset($_GET['product'])){
                    $this->aTPL_Body = array_merge($this->aTPL_Body, $this->pushTPLtoArray(BODY_TITLE));
                } else {
                    $this->makeCatalog();
                }
            } else {
                $this->makeCatalog();
            }
        }
        
        private function makeRight(){
            if(!isset($_GET['product'])){
                if(!isset($_GET['catalog'])){
                    $this->aTPL_Body = array_merge($this->aTPL_Body, $this->pushTPLtoArray(ABOUT));
                } else {
                    $this->aTPL_Body = array_merge($this->aTPL_Body, $this->pushTPLtoArray(ABOUT));
                }
            } else {
                $this->makeProduct();
            }            
        }
        
        private function makeCatalog(){
            $xmlFile = 'app/db/catalog/'.$_GET['catalog'].'.xml';
            $aXML = XML::xmlToArrayCatalog($xmlFile);
            
            $sTitleUrl = 'public/images/'.$_GET['catalog'].'_title.png';
            $this->aTPL_Body[] = '<div id="menuProducts">';
            $this->aTPL_Body[] = '<div id="menuProductTitle">';
            $this->aTPL_Body[] = '<img src="'.$sTitleUrl.'">';
            $this->aTPL_Body[] = '</div>';
       
            $i = 1;
            foreach( $aXML as $name => $product ){
                $this->aTPL_Body[] = '<div id="menuProduct'.$i.'">';
                $this->aTPL_Body[] = '<h4>"'.$product['rus_name'].'"</h4>';
                //echo $name;
                if($name == 'idilia' || $name == 'gloria' || $name == 'verona'){
                    $this->aTPL_Body[] = '<img id="new_model" src="public/images/new/new_model.png" width="70px">';
                }
                $this->aTPL_Body[] = '<a href="?catalog='.$_GET['catalog'].'&product='.$name.'">
                    <img src="'.$product['url'].'" width="120px"></a>';
                $this->aTPL_Body[] = '</div>';
                $i++;       
            }

            $this->aTPL_Body[] = '</div>';            
        }
        
        private function makeProduct(){
            $sTitleUrl = 'public/images/'.$_GET['catalog'].'_'.$_GET['product'].'_title.png';
            //echo '<img src="'.$sTitleUrl.'">';

            $xmlFile = 'app/db/products/'.$_GET['catalog'].'/'.$_GET['product'].'.xml';
            $aProduct = XML::xmlToArrayProduct($xmlFile);

            $sTitle = $aProduct[ $_GET['product'] ]['title'];
            $sCatalogDir = $_GET['catalog'];

            $sProductDir = ucfirst( $_GET['product']);

            $sShemaUrl = 'public/images/web/'.$sCatalogDir.'/'.$sProductDir.'/shema.png';
            
            $sShemaMiniUrl = 'public/images/web/'.$sCatalogDir.'/'.$sProductDir.'/shema_mini.png';
            
            $sRazmerUrl = 'public/images/web/'.$sCatalogDir.'/'.$sProductDir.'/razmer.png';
            
            $sRazmerMiniUrl = 'public/images/web/'.$sCatalogDir.'/'.$sProductDir.'/razmer_mini.png';
            
            $sInterUrl = 'public/images/web/'.$sCatalogDir.'/'.$sProductDir.'/inter.png';
            
            $sInterMiniUrl = 'public/images/web/'.$sCatalogDir.'/'.$sProductDir.'/inter_mini.png';
            


            $this->aTPL_Body[] = '<div id="product_about">';
             $this->aTPL_Body[] = '<div id="product_about_title">';
               $this->aTPL_Body[] = '<h1>"'.$sTitle.'"</h1>';
             $this->aTPL_Body[] = '</div>';

             $this->aTPL_Body[] = '<div id="shema">';
              $this->aTPL_Body[] = '<div id="shema_title">';
                $this->aTPL_Body[] = '<h2>Описание</h2>';
              $this->aTPL_Body[] = '</div><!-- SHEMA TITLE -->';
              $this->aTPL_Body[] = '<div id="shema_image">';
               $this->aTPL_Body[] = '<a href="'.$sShemaUrl.'" class="highslide"
                 onclick="return hs.expand(this)">';
               $this->aTPL_Body[] = '<img src="'.$sShemaMiniUrl.'" width="150px"></a>';
              $this->aTPL_Body[] = '</div><!-- SHEMA IMAGE -->';
              $this->aTPL_Body[] = '<div id="shema_text">';
               $this->aTPL_Body[] = '<p>'.$aProduct[ $_GET['product'] ]['shema_text'].'</p>';
              $this->aTPL_Body[] = '</div><!-- SHEMA TEXT-->';
             $this->aTPL_Body[] = '</div><!-- SHEMA-->';

             $this->aTPL_Body[] = '<div id="razmer">';
              $this->aTPL_Body[] = '<div id="razmer_title">';
               $this->aTPL_Body[] = '<h2>Размер</h2>';
              $this->aTPL_Body[] = '</div><!-- RAZMER TITLE -->';
              $this->aTPL_Body[] = '<div id="razmer_image">';
               $this->aTPL_Body[] = '<a href="'.$sRazmerUrl.'" class="highslide"
                     onclick="return hs.expand(this)">';
               $this->aTPL_Body[] = '<img src="'.$sRazmerMiniUrl.'" width="170px"></a>';
              $this->aTPL_Body[] = '</div><!-- RAZMER IMAGE -->';
              $this->aTPL_Body[] = '<div id="razmer_text">';
               $this->aTPL_Body[] = '<p>'.$aProduct[ $_GET['product'] ]['razmer_text'].'</p>';
              $this->aTPL_Body[] = '</div><!-- RAZMER TEXT -->';
             $this->aTPL_Body[] = '</div><!-- RAZMER -->';

             $this->aTPL_Body[] = '<div id="inter">';
              $this->aTPL_Body[] = '<div id="inter_title">';
               $this->aTPL_Body[] = '<h2>Фото в интерьере</h2>';
              $this->aTPL_Body[] = '</div><!-- INTER TITLE -->';
              $this->aTPL_Body[] = '<div id="inter_image">';
               $this->aTPL_Body[] = '<a href="'.$sInterUrl.'" class="highslide"
                    onclick="return hs.expand(this)">';
               $this->aTPL_Body[] = '<img src="'.$sInterMiniUrl.'" width="150px"></a>';
              $this->aTPL_Body[] = '</div><!-- INTER IMAGE-->';
             $this->aTPL_Body[] = '</div><!-- INTER -->';
            $this->aTPL_Body[] = '</div><!--end #product_about-->';            
        }
    }
?>
