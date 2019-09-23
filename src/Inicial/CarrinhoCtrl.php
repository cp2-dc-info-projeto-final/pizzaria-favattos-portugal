<?php 

    class CarrinhoCtrl {
        //Criação da sessão do carrinho para armazenar os dados
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