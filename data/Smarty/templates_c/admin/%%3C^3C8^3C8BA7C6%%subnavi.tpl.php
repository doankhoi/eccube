<?php /* Smarty version 2.6.26, created on 2015-09-11 10:09:32
         compiled from D:%5CWeb%5CServerHost%5Chtdocs%5Ceccube%5Chtml/../data/Smarty/templates/admin/ownersstore/subnavi.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'D:\\Web\\ServerHost\\htdocs\\eccube\\html/../data/Smarty/templates/admin/ownersstore/subnavi.tpl', 26, false),array('function', 't', 'D:\\Web\\ServerHost\\htdocs\\eccube\\html/../data/Smarty/templates/admin/ownersstore/subnavi.tpl', 27, false),)), $this); ?>

<ul class="level1">
    <li id="navi-ownersstore-index" class="<?php if (((is_array($_tmp=$this->_tpl_vars['tpl_subno'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'index'): ?>on<?php endif; ?>">
        <a href="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=@ADMIN_DIR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
ownersstore/<?php echo ((is_array($_tmp=@DIR_INDEX_PATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
"><span><?php echo smarty_function_t(array('string' => "tpl_Plug-in management_01"), $this);?>
</span></a></li>
    <li id="navi-ownersstore-module" class="<?php if (((is_array($_tmp=$this->_tpl_vars['tpl_subno'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'module'): ?>on<?php endif; ?>">
        <a href="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=@ADMIN_DIR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
ownersstore/module.php"><span><?php echo smarty_function_t(array('string' => 'tpl_Module management_01'), $this);?>
</span></a></li>
    <li id="navi-ownersstore-settings" class="<?php if (((is_array($_tmp=$this->_tpl_vars['tpl_subno'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'settings'): ?>on<?php endif; ?>">
        <a href="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=@ADMIN_DIR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
ownersstore/settings.php"><span><?php echo smarty_function_t(array('string' => 'tpl_Authentication key settings_01'), $this);?>
</span></a></li>
    <li id="navi-ownersstore-log" class="<?php if (((is_array($_tmp=$this->_tpl_vars['tpl_subno'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 'log'): ?>on<?php endif; ?>">
        <a href="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=@ADMIN_DIR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
ownersstore/log.php"><span><?php echo smarty_function_t(array('string' => 'tpl_Log management_01'), $this);?>
</span></a></li>
</ul>