<?php

require_once CLASS_EX_REALDIR . 'page_extends/LC_Page_Ex.php';

class Student{
	private $name;
	private $age;

	public function __construct($n, $a){
		$this->name = $n;
		$this->age = $a;
	}

	public function getName(){
		return $this->name;
	}

	public function printName($n){
		echo $n;
	}
}

class LC_Page_Demo_Hello extends LC_Page_Ex{

	public $products = array();

	public function init(){
		parent::init();
		$objStudent = new Student("doankhoi", 23);
		$this->tpl_title = "Danh sách các sản phẩm";
		$this->demoObj = $objStudent;
		$this->tpl_mainpage = TEMPLATE_REALDIR."demo/index.tpl";
	}

	public function process(){
		parent::process();
		$this->action();
		//Hành động gửi về sau khi xử lý
		$this->sendResponse();
	}

	public function destroy(){
		parent::destroy();
	}

	public function action(){
		$objQuery = &SC_Query_Ex::getSingletonInstance();
		$col = "*";
		$from = "dtb_products";
		$result = $objQuery->select($col, $from);
		if($result == null){
			$this->message = "Không có sản phẩm";
		}else{
			$this->message = null;
		}

		$this->products = $result;
	}

}
?>