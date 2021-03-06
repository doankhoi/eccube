<!-- -*- coding: utf-8 -*- -->
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
 * エラー表示のページクラス
 *
 * @package Page
 * @author LOCKON CO.,LTD.
 * @version $Id: LC_Page_Error_DispError.php 22496 2013-02-04 09:12:18Z m_uehara $
 */
class LC_Page_Error_DispError extends LC_Page_Admin_Ex {

    // }}}
    // {{{ functions

    /**
     * Page を初期化する.
     * LC_Page_Adminクラス内でエラーページを表示しようとした際に無限ループに陥るのを防ぐため,
     * ここでは, parent::init() を行わない.(フロントのエラー画面出力と同様の仕様)
     *
     * @return void
     */
    function init() {
        $this->template = LOGIN_FRAME;
        $this->tpl_mainpage = 'login_error.tpl';
        $this->tpl_title = t('c_Login error_01');
        // ディスプレイクラス生成
        $this->objDisplay = new SC_Display_Ex();

        // transformでフックしているばあいに, 再度エラーが発生するため, コールバックを無効化.
        $objHelperPlugin = SC_Helper_Plugin_Ex::getSingletonInstance($this->plugin_activate_flg);
        $objHelperPlugin->arrRegistedPluginActions = array();
    }

    /**
     * Page のプロセス。
     *
     * @return void
     */
    function process() {
        $this->action();
        $this->sendResponse();
    }

    /**
     * Page のプロセス。
     *
     * @return void
     */
    function action() {

        switch ($this->type) {
            case LOGIN_ERROR:
                $this->tpl_error=t('c_The ID or password is not correct.<br />Check and reenter the ID and password._01');
                break;
            case ACCESS_ERROR:
                $this->tpl_error=t('c_Your login session has expired.<br /> Please log in again._01');
                break;
            case AUTH_ERROR:
                $this->tpl_error=t('c_You cannot access this page_01');
                SC_Response_Ex::sendHttpStatus(403);
                break;
            case INVALID_MOVE_ERRORR:
                $this->tpl_error=t('c_Illegal page migration.<br />Check page again._01');
                break;
            default:
                $this->tpl_error=t('c_An error has occurred.<br />Check and log in again._01');
                break;
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
     * エラーページではトランザクショントークンの自動検証は行わない
     */
    function doValidToken() {
        // queit.
    }
}
