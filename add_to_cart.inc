<?php

class add_to_cart{
    function addService($sid,$qty){
        $_SESSION['cart'][$sid]['qty']=$qty;
    }
    function updateService($sid,$qty){
        if(isset($_SESSION['cart'][$sid])){
            $_SESSION['cart'][$sid]['qty'] =$qty;
        }
    }
    function removeService($sid){
        if(isset($_SESSION['cart'][$sid])){
            unset($_SESSION['cart'][$sid]);
        }
    }function emptyService(){
        empty($_SESSION['cart']);
    }
    function totalService(){
        if(isset($_SESSION['cart'])){
            return count ($_SESSION['cart']);
        }else{
            return 0;
        }

    }
}



?>