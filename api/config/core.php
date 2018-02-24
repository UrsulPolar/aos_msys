<?php 
define('DS', DIRECTORY_SEPARATOR);
define('ROOT_DIR', 'C:'.DS.'laragon'.DS.'www'.DS.'aos_msys_new');
define('INCLUDE_DIR', ROOT_DIR.DS.'api'.DS.'config');
define('CLASS_DIR', ROOT_DIR.DS.'api'.DS.'objects');


$include= scandir(INCLUDE_DIR);
$objects= scandir(CLASS_DIR);

    foreach($include as $file){
        if($file != '.' && $file != '..'){
            require_once(INCLUDE_DIR.DS.$file);
        }
    }

    foreach($objects as $file){
        if($file != '.' && $file != '..'){
           require_once(CLASS_DIR.DS.$file);
        }
    }

    
    // show error reporting
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    
//     // home page url
//     $home_url="http://localhost/api/";
    
//     // page given in URL parameter, default page is one
//     $page = isset($_GET['page']) ? $_GET['page'] : 1;
    
//     // set number of records per page
//     $records_per_page = 5;
    
//     // calculate for the query LIMIT clause
//     $from_record_num = ($records_per_page * $page) - $records_per_page;
?>