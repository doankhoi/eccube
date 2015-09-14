<?php
/*
 * CategoryContents
 * Copyright (C) 2012 LOCKON CO.,LTD. All Rights Reserved.
 * http://www.lockon.co.jp/
 * 
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */


/* 
 * カテゴリ毎にコンテンツを設定する事ができます。
 */
class CategoryContents extends SC_Plugin_Base {

    /**
     * コンストラクタ
     * プラグイン情報(dtb_plugin)をメンバ変数をセットします.
     */
    public function __construct(array $arrSelfInfo) {
        parent::__construct($arrSelfInfo);
    }

    
    function install($arrPlugin) {
    	$objQuery =& SC_Query_Ex::getSingletonInstance();
        $objQuery->query("ALTER TABLE dtb_category ADD plg_categorycontents_category_contents TEXT");
        if(copy(PLUGIN_UPLOAD_REALDIR . "CategoryContents/logo.png", PLUGIN_HTML_REALDIR . "CategoryContents/logo.png") === false);
    }

    
    function uninstall($arrPlugin) {
    	$objQuery =& SC_Query_Ex::getSingletonInstance();
        $objQuery->query("ALTER TABLE dtb_category DROP plg_categorycontents_category_contents");
        
        // nop
    }
    
    
    function enable($arrPlugin) {
        // nop
    }

    
    function disable($arrPlugin) {
        // nop
    }

    /**
     * カテゴリ毎にコンテンツの登録をします.
     * @param LC_Page_Admin_Products_Category $objPage <管理画面>カテゴリ登録.
     * @return void
     */
    function contents_set($objPage) {
        $post = $_POST;
        switch ($post['mode']) {
            // 編集押下時
            case 'pre_edit':
                $category_id = $objPage->arrForm['category_id'];
                $array_category = CategoryContents::getCategoryByCategoryId($category_id);
                $objPage->arrForm['plg_categorycontents_category_contents'] = $array_category['plg_categorycontents_category_contents'];
                break;
            // 登録押下時
            case 'edit':
                $category_id = $post['category_id'];
                $category_contents = $post['plg_categorycontents_category_contents'];
                // 新規登録
                if(empty($category_id)){
                    $category_name = $post['category_name'];
                    $array_category = CategoryContents::getCategoryByCategoryName($category_name);
                    $category_id = $array_category['category_id'];
                }
                CategoryContents::updateCategoryContents($category_id,$category_contents);
                break;
            default:
                break;
        }
    }

    /**
     * 商品一覧でカテゴリが指定されている場合に登録されているコンテンツを表示します.
     * 
     * @param LC_Page_Products_List $objPage 
     * @return void
     */
    function disp_contents($objPage) {
        // 選択されたカテゴリーID
        $category_id = $objPage->arrSearchData['category_id'];
        if(!empty($category_id)){
            $array_category = CategoryContents::getCategoryByCategoryId($category_id);
            $objPage->plg_categoryContents_category_contents = $array_category['plg_categorycontents_category_contents'];
        }
    }
    
    /**
     * プレフィルタコールバック関数
     *
     * @param string &$source テンプレートのHTMLソース
     * @param LC_Page_Ex $objPage ページオブジェクト
     * @param string $filename テンプレートのファイル名
     * @return void
     */
    function prefilterTransform(&$source, LC_Page_Ex $objPage, $filename) {
        $objTransform = new SC_Helper_Transform($source);
        $template_dir = PLUGIN_UPLOAD_REALDIR . 'CategoryContents/templates/';
        switch($objPage->arrPageLayout['device_type_id']){
            case DEVICE_TYPE_MOBILE:
            case DEVICE_TYPE_SMARTPHONE:
            case DEVICE_TYPE_PC:
                // 商品一覧画面
                if (strpos($filename, 'products/list.tpl') !== false) {
                    $objTransform->select('h2.title')->insertBefore(file_get_contents($template_dir . 'categorycontents_products_list_add.tpl'));
                }
                break;
            case DEVICE_TYPE_ADMIN:
            default:
                // カテゴリ登録画面
                if (strpos($filename, 'products/category.tpl') !== false) {
                    $objTransform->select('div.now_dir')->replaceElement(file_get_contents($template_dir . 'categorycontents_admin_basis_category_add.tpl'));
                }
                break;
        }
        $source = $objTransform->getHTML();
    }
    
    /**
     * カテゴリIDからカテゴリ情報を取得します
     * 
     * @param int $category_id カテゴリID
     * @return array カテゴリ情報
     */
    function getCategoryByCategoryId ($category_id) {
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $col = "*";
        $from = "dtb_category"; 
        $where = "category_id = ?";
        $array_categorys = $objQuery->select($col, $from, $where, array($category_id));
        return $array_categorys[0];
    }

    /**
     * カテゴリ名からカテゴリ情報を取得します
     * 
     * @param string $category_name カテゴリ名
     * @return array カテゴリ情報
     */
    function getCategoryByCategoryName ($category_name) {
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $col = "*";
        $from = "dtb_category"; 
        $where = "category_name = ?";
        $array_categorys = $objQuery->select($col, $from, $where, array($category_name));
        return $array_categorys[0];
    }
    
    /**
     * dtb_categoryのcategory_contentsを更新します.
     * 
     * @param int $category_id カテゴリID
     * @param string $category_contents カテゴリコンテンツ
     * @return void
     */
    function updateCategoryContents ($category_id, $category_contents) {
        $objQuery =& SC_Query_Ex::getSingletonInstance();
        $sqlval = array();
        $table = "dtb_category";
        $sqlval['plg_categorycontents_category_contents'] = $category_contents;
        $sqlval['update_date'] = 'CURRENT_TIMESTAMP';
        $where = "category_id = ?";
        $objQuery->update($table, $sqlval, $where, array($category_id));        
    }
    
}

?>
