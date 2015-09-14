<?php 
/**
* 
*/
class plugin_info
{
	static $PLUGIN_CODE       = "MyRefineKeyword";
    static $PLUGIN_NAME       = "Suggest search";
    static $CLASS_NAME        = "MyRefineKeyword";
    static $PLUGIN_VERSION    = "0.1";
    static $COMPLIANT_VERSION = "2.12.6";
    static $AUTHOR            = "doankhoi";
    static $DESCRIPTION       = "This is demo search product";
    static $PLUGIN_SITE_URL   = "http://localhost";
    static $AUTHOR_SITE_URL   = "http://localhost";
    static $HOOK_POINTS       =  array(
        array('prefilterTransform', 'prefilterTransform'),
        array('LC_Page_Products_List_action_after', 'LC_Page_Products_List_action_after')
    );
    static $LICENSE           = "LGPL";
}
?>