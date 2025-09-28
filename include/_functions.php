<?php

ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); 

# ----------- variables 
define("REDSEAM_API", "https://api.redseam.redberryinternship.ge/api");


# General functions
function get_products(){

}


# Basic Curl Requests Functions 

    // ------------ Create universal Get Request
    function make_get_request( $relative_url ){ // relative url according to redberry_api       
         
        $curl_req = curl_init();

        curl_setopt($curl_req, CURLOPT_HTTPHEADER,  ['Accept: application/json'] );
        curl_setopt($curl_req, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl_req, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl_req, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($curl_req, CURLOPT_URL, REDSEAM_API.$relative_url);

        $response = curl_exec($curl_req);
        if (curl_errno($curl_req)) {
            echo 'cURL Error (GET): ' . curl_error($curl_req) . "\n";
        }
        curl_close($curl_req);

        return $response;
    }

    // -------------- Create universal Post Request
    function make_post_request(){

    }


    // -------------- Create universal Patch Request
    function make_patch_request(){

    }


    // -------------- Create universal Delete Request
    function make_delete_request(){

    }



?>