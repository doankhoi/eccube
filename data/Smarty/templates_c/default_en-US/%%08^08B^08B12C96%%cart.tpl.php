<?php /* Smarty version 2.6.26, created on 2015-09-11 10:09:37
         compiled from D:%5CWeb%5CServerHost%5Chtdocs%5Ceccube%5Chtml/../data/Smarty/templates/default_en-US/frontparts/bloc/cart.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'D:\\Web\\ServerHost\\htdocs\\eccube\\html/../data/Smarty/templates/default_en-US/frontparts/bloc/cart.tpl', 25, false),array('modifier', 'number_format', 'D:\\Web\\ServerHost\\htdocs\\eccube\\html/../data/Smarty/templates/default_en-US/frontparts/bloc/cart.tpl', 28, false),array('modifier', 'default', 'D:\\Web\\ServerHost\\htdocs\\eccube\\html/../data/Smarty/templates/default_en-US/frontparts/bloc/cart.tpl', 28, false),)), $this); ?>

<div class="block_outer">
    <div id="cart_area">
    <h2 class="cart"><img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/title/icon_bloc_cart.gif" alt="" /><span class="title">Cart</span></h2>
        <div class="block_body">
            <div class="information">
                <p class="item">Items in cart:<span class="attention"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrCartList']['0']['TotalQuantity'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
</span></p>
                <p class="total">Total amount:<span class="price">&#36; <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrCartList']['0']['ProductsTotal'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
</span></p>
                                <?php if (((is_array($_tmp=$this->_tpl_vars['arrCartList']['0']['TotalQuantity'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 0 && ((is_array($_tmp=$this->_tpl_vars['arrCartList']['0']['free_rule'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 0 && ! ((is_array($_tmp=$this->_tpl_vars['isMultiple'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) && ! ((is_array($_tmp=$this->_tpl_vars['hasDownload'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                <p class="postage">
                    <?php if (((is_array($_tmp=$this->_tpl_vars['arrCartList']['0']['deliv_free'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 0): ?>
                        <span class="price">&#36; <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrCartList']['0']['deliv_free'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
 (including tax)</span> until shipping and processing fees are free.
                    <?php else: ?>
                        Currently, shipping is "<span class="price">free</span>".
                    <?php endif; ?>
                </p>
                <?php endif; ?>
            </div>
            <div class="btn">				
                <a class="bt03" href="<?php echo ((is_array($_tmp=@CART_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">View cart</a>
            </div>
        </div>
    </div>
</div>