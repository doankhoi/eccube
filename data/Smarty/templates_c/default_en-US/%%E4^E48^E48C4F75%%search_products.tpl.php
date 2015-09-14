<?php /* Smarty version 2.6.26, created on 2015-09-14 06:20:17
         compiled from D:%5CWeb%5CServerHost%5Chtdocs%5Ceccube%5Chtml/../data/Smarty/templates/default_en-US/frontparts/bloc/search_products.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', 'D:\\Web\\ServerHost\\htdocs\\eccube\\html/../data/Smarty/templates/default_en-US/frontparts/bloc/search_products.tpl', 25, false),array('modifier', 'h', 'D:\\Web\\ServerHost\\htdocs\\eccube\\html/../data/Smarty/templates/default_en-US/frontparts/bloc/search_products.tpl', 51, false),array('function', 'html_options', 'D:\\Web\\ServerHost\\htdocs\\eccube\\html/../data/Smarty/templates/default_en-US/frontparts/bloc/search_products.tpl', 35, false),)), $this); ?>

<div class="block_outer">
    <div id="search_area">
    <h2><img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/title/icon_bloc_search.gif" alt="" /><span class="title">Search</span></h2>
        <div class="block_body">
            <!--検索フォーム-->
            <form name="search_form" id="search_form" method="get" action="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
products/list.php">
            <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
            <dl class="formlist">
                <dt>Product categories</dt>
                <dd><input type="hidden" name="mode" value="search" />
                <select name="category_id" class="box145">
                    <option label="All products" value="">All products</option>
                    <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrCatList'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['category_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                </select>
                </dd>
            </dl>
            <dl class="formlist">
                <?php if (((is_array($_tmp=$this->_tpl_vars['arrMakerList'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                <dt>Manufacturers</dt>
                <dd><select name="maker_id" class="box145">
                    <option label="All manufacturers" value="">All manufacturers</option>
                    <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['arrMakerList'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)),'selected' => ((is_array($_tmp=$this->_tpl_vars['maker_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))), $this);?>

                </select>
                </dd>
            </dl>
            <dl class="formlist">
                <?php endif; ?>
                <dt>Product name</dt>
                <dd><input type="text" name="name" class="box140" maxlength="50" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$_GET['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" /></dd>
            </dl>
            <p class="btn">
				<button class="bt02" name="search">Search</button>
			</p>
            </form>
        </div>
    </div>
</div>