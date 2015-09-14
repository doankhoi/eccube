<?php 
require_once '../require.php';
require_once CLASS_EX_REALDIR . 'page_extends/demo/LC_Page_Demo_Hello_Ex.php';

$objPage = new LC_Page_Demo_Hello_Ex();
register_shutdown_function(array($objPage, 'destroy'));
$objPage->init();
$objPage->process();
?>