<?php /* Smarty version 2.6.26, created on 2015-09-11 10:09:37
         compiled from D:%5CWeb%5CServerHost%5Chtdocs%5Ceccube%5Chtml/../data/Smarty/templates/default_en-US/footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'D:\\Web\\ServerHost\\htdocs\\eccube\\html/../data/Smarty/templates/default_en-US/footer.tpl', 28, false),array('modifier', 'date_format', 'D:\\Web\\ServerHost\\htdocs\\eccube\\html/../data/Smarty/templates/default_en-US/footer.tpl', 28, false),array('modifier', 'default', 'D:\\Web\\ServerHost\\htdocs\\eccube\\html/../data/Smarty/templates/default_en-US/footer.tpl', 29, false),array('modifier', 'h', 'D:\\Web\\ServerHost\\htdocs\\eccube\\html/../data/Smarty/templates/default_en-US/footer.tpl', 29, false),)), $this); ?>

<!--▼FOOTER-->
<div id="footer_wrap">
    <div id="footer" class="clearfix">
        <div id="pagetop"><a href="#top">Top of page</a></div>
        <div id="copyright">Copyright &copy;
            <?php if (((is_array($_tmp=@RELEASE_YEAR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ((is_array($_tmp=((is_array($_tmp=time())) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y"))): ?><?php echo ((is_array($_tmp=@RELEASE_YEAR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-<?php endif; ?><?php echo ((is_array($_tmp=((is_array($_tmp=time())) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>

            <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['shop_name_eng'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['shop_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : smarty_modifier_default($_tmp, ((is_array($_tmp=$this->_tpl_vars['arrSiteInfo']['shop_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
 All rights reserved.
        </div>
    </div>
</div>
<!--▲FOOTER-->