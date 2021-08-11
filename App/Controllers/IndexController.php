<?php
    // Autor: Diego Oliveira;
    // Github: DiegoOliveiraDvJr;
    // Descrição: Gerador de QR Code
?>
<?php

    namespace App\Controllers;

    //recursos miniframework
    use MF\Controller\Action;

    class IndexController extends Action{

        public function index(){
            
            $this->render('index');
        }
        
    }

?>