<?php /* Smarty version 2.6.26, created on 2015-09-11 10:09:37
         compiled from D:%5CWeb%5CServerHost%5Chtdocs%5Ceccube%5Chtml/../data/Smarty/templates/default_en-US/header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'D:\\Web\\ServerHost\\htdocs\\eccube\\html/../data/Smarty/templates/default_en-US/header.tpl', 28, false),array('modifier', 'h', 'D:\\Web\\ServerHost\\htdocs\\eccube\\html/../data/Smarty/templates/default_en-US/header.tpl', 28, false),array('modifier', 'count', 'D:\\Web\\ServerHost\\htdocs\\eccube\\html/../data/Smarty/templates/default_en-US/header.tpl', 34, false),)), $this); ?>

<!--▼HEADER-->
<div id="header_wrap">
    <div id="header" class="clearfix">
        <div id="logo_area">
            <h1>
                <a href="<?php echo ((is_array($_tmp=@TOP_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
"><img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/common/logo.png" alt="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['shop_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" /><span><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['shop_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
/<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_title'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</span></a>
            </h1>
        </div>
        <div id="header_utility">
            <div id="headerInternalColumn">
                        <?php if (count(((is_array($_tmp=$this->_tpl_vars['arrPageLayout']['HeaderInternalNavi'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) > 0): ?>
                                <?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrPageLayout']['HeaderInternalNavi'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['HeaderInternalNaviKey'] => $this->_tpl_vars['HeaderInternalNaviItem']):
?>
                    <!-- ▼<?php echo ((is_array($_tmp=$this->_tpl_vars['HeaderInternalNaviItem']['bloc_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
 -->
                    <?php if (((is_array($_tmp=$this->_tpl_vars['HeaderInternalNaviItem']['php_path'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
                        <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => ((is_array($_tmp=$this->_tpl_vars['HeaderInternalNaviItem']['php_path'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)), 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array('items' => ((is_array($_tmp=$this->_tpl_vars['HeaderInternalNaviItem'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))), $this); ?>

                    <?php else: ?>
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['HeaderInternalNaviItem']['tpl_path'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)), 'smarty_include_vars' => array('items' => ((is_array($_tmp=$this->_tpl_vars['HeaderInternalNaviItem'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    <?php endif; ?>
                    <!-- ▲<?php echo ((is_array($_tmp=$this->_tpl_vars['HeaderInternalNaviItem']['bloc_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
 -->
                <?php endforeach; endif; unset($_from); ?>
                            <?php endif; ?>
                        </div>
            <div id="header_navi">
                <ul>
                    <li class="mypage">
                    <a href="<?php echo ((is_array($_tmp=@HTTPS_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
mypage/login.php">MY page</a>
                    </li>
                    <li class="entry">
                        <a href="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
entry/kiyaku.php">Member registration</a>
                    </li>
                    <li class="view_basket">
                        <a href="<?php echo ((is_array($_tmp=@CART_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
"><img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/icon_cart.png" alt="" />View cart</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--▲HEADER-->