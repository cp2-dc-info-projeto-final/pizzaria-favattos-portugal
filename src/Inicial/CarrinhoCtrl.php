<?php 

    class CarrinhoCtrl {
        //Criação da sessão do carrinho para armazenar os dados
        public function getCarrinho($session) {

            if (!isset($session["carrinho"]))
            {
                $session["carrinho"] = [];
            }
            return $session["carrinho"];
                
        }

    }

    

?>