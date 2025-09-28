<?php

$request_string_array = explode("?",$_SERVER['REQUEST_URI']."?");
$request_action = $request_string_array[0];

//echo "<pre>"; print_r($_SERVER); echo "</pre>";

switch ($request_action) {

    case '':
    case '/':
    case '/products':                                               
        $request = "/products";
        $file='products';
        break;

    case preg_match('/^\/products\/[0-9]+$/', $request_action)==1:     
        $request = $request_action;
        $file='product_page';
        break;

    case '/login':                                                  
        $request = "/login";
        $file='login_register';   
        break;

    case '/register':                                               
        $request = "/register";
        $file='login_register';   
        break;

    case '/cart':
        $request = "/cart";
        $file='cart';
        break;

    case '/cart/checkout':
        $request = "/checkout";
        $file='cart';
        break;

    case  preg_match('/^\/cart/products\/[0-9]+$/', $request_action)==1 : // '/cart/products/{}'
        $request = "/cart/products";
        $file='cart';
        break;
    
    default:
        //http_response_code(404);
        $file = '404';
        break;
}

?>