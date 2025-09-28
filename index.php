<?php 
    # all functions 
    include('include/_functions.php');

    # Routing 
    include('include/_routes.php');

    #ajax functions 
    include('include/_ajax_functions.php');


    # inclulde Header part
    include('include/header.php');

    #include main part
    include('include/'.$file.'.php');
    
    #include footer part
    include('include/footer.php');

?>