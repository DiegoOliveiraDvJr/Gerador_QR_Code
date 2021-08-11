<?php
    // Autor: Diego Oliveira;
    // Github: DiegoOliveiraDvJr;
    // Descrição: Gerador de QR Code;
?>
<?php
    namespace App;
    use MF\Init\Bootstrap;

    class Route extends Bootstrap{
       
        protected function initRoutes(){

            $routes['home'] = array(
                'route' => '/',
                'controller' => 'indexController',
                'action' => 'index'    
            );
            $this->setRoute($routes);
       } 

    }
?>