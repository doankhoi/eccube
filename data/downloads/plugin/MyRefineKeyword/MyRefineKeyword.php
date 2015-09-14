<?php 

class MyRefineKeyword extends SC_Plugin_Base {

	public function __construct(array $arrSelInfo){
		parent::__construct($arrSelInfo);
	}

	public function install($arrPlugin){
		if(file_exists(PLUGIN_UPLOAD_REALDIR."MyRefineKeyword/logo.png")){
			if(copy(PLUGIN_UPLOAD_REALDIR."MyRefineKeyword/logo.png", PLUGIN_HTML_REALDIR."MyRefineKeyword/logo.png") === false);
		}
	}

	public function uninstall($arrPlugin){
		if(file_exists(PLUGIN_HTML_REALDIR."MyRefineKeyword/logo.png")){
			if(SC_Helper_FileManager_Ex::deleteFile(PLUGIN_HTML_REALDIR."MyRefineKeyword/logo.png")===false);
		}
	}

	public function enable($arrPlugin){

	}

	public function disable($arrPlugin){

	}

	public function register(SC_Helper_Plugin $objHelperPlugin){
		return parent::register($objHelperPlugin, $priority);
	}

	public function insertFreeField(){

	}

	public function insertBloc($arrPlugin){

	}

	public function prefilterTransform(&$source, LC_Page_Ex $objPage, $filename){
		$objTransform = new SC_Helper_Transform($source);
		$template_dir = PLUGIN_UPLOAD_REALDIR."MyRefineKeyword/";

		switch ($objPage->arrPageLayout['device_type_id']) {
			case DEVICE_TYPE_MOBILE:
        	case DEVICE_TYPE_SMARTPHONE:
            break;
        	case DEVICE_TYPE_PC:
            	if (strpos($filename, 'products/list.tpl') !== false) { //Tìm file template đã tồn tại chưa
                	$objTransform->select('div.pagenumber_area')->insertBefore(file_get_contents($template_dir . 'RefineKeyword.tpl'));
            	}
            	break;
        	case DEVICE_TYPE_ADMIN:
        	default:
			/*
				if (strpos($filename, 'products/product.tpl') !== false) {
					$objTransform->select('table.form tr',1)->insertBefore(file_get_contents($template_dir . 'RefineKeyword.tpl'));
				}
 			*/
            break;
		}

		$source = $objTransform->getHTML();
	}

	public function LC_Page_Products_List_action_after($objPage){
		$arrKeyword = array();
		$arrSearchCondition = $objPage->lfGetSearchCondition($objPage->arrSearchData); //arrSearchData là điều kiện search
		$objQuery = SC_Query_Ex::getSingletonInstance();
		$objQuery->setWhere($arrSearchCondition['where'], $arrSearchCondition['arrval']);

		$rs = $objQuery->select('comment3', 'dtb_products as alldtl');
		foreach ($rs as $arrProducts) {
			$arrKeyword = array_merge($arrKeyword, explode(',', $arrProducts['comment3']));
		}

		$objPage->arrKeyword = array_unique($arrKeyword);
	}
}

?>