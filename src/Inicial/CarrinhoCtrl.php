<?php 

    class CarrinhoCtrl {

        public function getCarrinho() {
            session_start();

            if (!isset($_SESSION["carrinho"]))
            {
                $_SESSION["carrinho"] = [];
            }
            return $_SESSION["carrinho"];
                
        }
    }

    

?>