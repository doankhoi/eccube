<?php /* Smarty version 2.6.26, created on 2015-09-11 10:09:37
         compiled from error.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'error.tpl', 27, false),)), $this); ?>

<div id="undercolumn">
    <div id="undercolumn_error">
        <div class="message_area">
            <!--★エラーメッセージ-->
            <p class="error"><?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_error'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</p>
        </div>

        <div class="btn_area">
            <ul>
                <li>
                    <?php if (((is_array($_tmp=$this->_tpl_vars['return_top'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                        <a class="bt02" href="<?php echo ((is_array($_tmp=@TOP_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">Home</a>
                    <?php else: ?>
                        <a class="bt04" href="javascript:history.back()">Go back</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</div>