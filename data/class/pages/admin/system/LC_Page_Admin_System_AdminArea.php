<?php
/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) 2000-2012 LOCKON CO.,LTD. All Rights Reserved.
 *
 * http://www.lockon.co.jp/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

// {{{ requires
require_once CLASS_EX_REALDIR . 'page_extends/admin/LC_Page_Admin_Ex.php';

/**
 * 店舗基本情報 のページクラス.
 *
 * @package Page
 * @author LOCKON CO.,LTD.
 * @version $Id: LC_Page_Admin_System_AdminArea.php 22498 2013-02-04 12:42:42Z kim $
 */
class LC_Page_Admin_System_AdminArea extends LC_Page_Admin_Ex {

    // }}}
    // {{{ functions

    /**
     * Page を初期化する.
     *
     * @return void
     */
    function init() {
        parent::init();
        $this->tpl_mainpage = 'system/adminarea.tpl';
        $this->tpl_subno = 'adminarea';
        $this->tpl_mainno = 'system';
        $this->tpl_maintitle = t('c_System_01');
        $this->tpl_subtitle = t('c_Management screen settings_01');
        $this->tpl_enable_ssl = FALSE;
    }

    /**
     * Page のプロセス.
     *
     * @return void
     */
    function process() {
        $this->action();
        $this->sendResponse();
    }

    /**
     * Page のアクション.
     *
     * @return void
     */
    function action() {

        if (strpos(HTTPS_URL,'https://') !== FALSE) {
            $this->tpl_enable_ssl = TRUE;
        }

        $objFormParam = new SC_FormParam_Ex;

        // パラメーターの初期化
        $this->initParam($objFormParam, $_POST);

        if (count($_POST) > 0) {

            // エラーチェック
            $arrErr = $objFormParam->checkError();

            $this->arrForm = $objFormParam->getHashArray();

            //設定ファイルの権限チェック
            if (!is_writable(CONFIG_REALFILE)) {
                $arrErr['all'] = t('c_You do not have access to change T_ARG1._01', array('T_ARG1' => CONFIG_REALFILE));
            }

            //管理画面ディレクトリのチェック
            $this->lfCheckAdminArea($this->arrForm, $arrErr);

            if (SC_Utils_Ex::isBlank($arrErr) && $this->lfUpdateAdminData($this->arrForm)) {

                $this->tpl_onload = "window.alert('" . t('c_Management area settings were revised. If the URL was changed, access the new URL._01') . "');";
            } else {
                $this->tpl_onload = "window.alert('" . t('c_There is an error in the settings details. Check the settings details._01') . "');";
                $this->arrErr = array_merge($arrErr, $this->arrErr);
            }

        } else {

            $admin_dir = str_replace('/','',ADMIN_DIR);
            $this->arrForm = array('admin_dir'=>$admin_dir,'admin_force_ssl'=>ADMIN_FORCE_SSL,'admin_allow_hosts'=>'');
            if (defined('ADMIN_ALLOW_HOSTS')) {
                $allow_hosts = unserialize(ADMIN_ALLOW_HOSTS);
                $this->arrForm['admin_allow_hosts'] = implode("\n",$allow_hosts);

            }
        }

    }

    /**
     * デストラクタ.
     *
     * @return void
     */
    function destroy() {
        parent::destroy();
    }

    /**
     * パラメーター初期化.
     *
     * @param object $objFormParam
     * @param array  $arrParams  $_POST値
     * @return void
     */
    function initParam(&$objFormParam, &$arrParams) {

        $objFormParam->addParam(t('c_Directory name_01'), 'admin_dir', ID_MAX_LEN, 'a', array('EXIST_CHECK', 'SPTAB_CHECK', 'ALNUM_CHECK'));
        $objFormParam->addParam(t('c_SSL restrictions_01'), 'admin_force_ssl', 1, 'n', array('NUM_CHECK', 'MAX_LENGTH_CHECK'));
        $objFormParam->addParam(t('c_IP restriction_01'), 'admin_allow_hosts', LTEXT_LEN, 'a', array('IP_CHECK', 'MAX_LENGTH_CHECK'));
        $objFormParam->setParam($arrParams);
        $objFormParam->convParam();

    }

    /**
     * 管理機能ディレクトリのチェック.
     *
     * @param array  $arrForm  $this->arrForm値
     * @param array  $arrErr   エラーがあった項目用配列
     * @return void
     */
    function lfCheckAdminArea(&$arrForm, &$arrErr) {
        $admin_dir = trim($arrForm['admin_dir']) . '/';

        $installData = file(CONFIG_REALFILE, FILE_IGNORE_NEW_LINES);
        foreach ($installData as $key=>$line) {
            if (strpos($line,'ADMIN_DIR') !== false and ADMIN_DIR != $admin_dir) {
                //既存ディレクトリのチェック
                if (file_exists(HTML_REALDIR.$admin_dir) and $admin_dir != 'admin/') {
                    $arrErr['admin_dir'] .= t('c_T_ARG1 already exists. Please designate a different directory name._01', array('T_ARG1' => ROOT_URLPATH . $admin_dir));
                    
                }
                //権限チェック
                if (!is_writable(HTML_REALDIR . ADMIN_DIR)) {
                    $arrErr['admin_dir'] .= t('c_You do not have access to change the T_ARG1 directory name._01', array('T_ARG1' => ROOT_URLPATH . ADMIN_DIR));
                    
                }
            }
        }
    }

    //管理機能ディレクトリのリネームと CONFIG_REALFILE の変更
    function lfUpdateAdminData(&$arrForm) {
        $admin_dir = trim($arrForm['admin_dir']) . '/';
        $admin_force_ssl = 'false';
        if ($arrForm['admin_force_ssl'] == 1) {
            $admin_force_ssl = 'true';
        }
        $admin_allow_hosts = explode("\n", $arrForm['admin_allow_hosts']);
        foreach ($admin_allow_hosts as $key=>$host) {
            $host = trim($host);
            if (strlen($host) >= 8) {
                $admin_allow_hosts[$key] = $host;
            } else {
                unset($admin_allow_hosts[$key]);
            }
        }
        $admin_allow_hosts = serialize($admin_allow_hosts);

        // CONFIG_REALFILE の書き換え
        $installData = file(CONFIG_REALFILE, FILE_IGNORE_NEW_LINES);
        $diff = 0;
        foreach ($installData as $key=>$line) {
            if (strpos($line,'ADMIN_DIR') !== false and ADMIN_DIR != $admin_dir) {
                $installData[$key] = 'define("ADMIN_DIR", "' . $admin_dir . '");';
                //管理機能ディレクトリのリネーム
                if (!rename(HTML_REALDIR.ADMIN_DIR,HTML_REALDIR.$admin_dir)) {
                    $this->arrErr['admin_dir'] .= t('c_The T_ARG1 directory name could not be changed._01', array('T_ARG1' => ROOT_URLPATH . ADMIN_DIR));
                    
                    return false;
                }
                $diff ++;
            }

            if (strpos($line,'ADMIN_FORCE_SSL') !== false) {
                $installData[$key] = 'define("ADMIN_FORCE_SSL", ' . $admin_force_ssl.');';
                $diff ++;
            }
            if (strpos($line,'ADMIN_ALLOW_HOSTS') !== false and ADMIN_ALLOW_HOSTS != $admin_allow_hosts) {
                $installData[$key] = "define('ADMIN_ALLOW_HOSTS', '" . $admin_allow_hosts."');";
                $diff ++;
            }
        }

        if ($diff > 0) {
            $fp = fopen(CONFIG_REALFILE,'wb');
            $installData = implode("\n",$installData);
            echo $installData;
            fwrite($fp, $installData);
            fclose($fp);
        }
        return true;
    }
}
