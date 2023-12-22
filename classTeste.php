<?php

        class classTeste{
                //mort personnage
            public $vie = 100;
            public $atk = 20;
            public $nom ;


            public function __construct()
            {
                
            }
            public function regenerer($vie)
            {
                $this->vie = $vie;
            }

            public function mortPerso(){
              
                if ( $this->vie == 0 ) {
                    return false;
                    echo 'Le personnage est mort ';
               }  else{
                return true;
               }
                
            }
        }

?>