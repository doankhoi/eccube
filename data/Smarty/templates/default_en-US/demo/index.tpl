
<link rel="stylesheet" type="text/css" href="<!--{$TPL_URLPATH}-->css/demo.css">

<!--{assign var=address value="Ha Noi"}-->

<h1><!--{$tpl_title}--></h1>

<p>Tên: <!--{$smarty.template}--></p>
<table>
	<tr>
		<th>Mã ID</th>
		<th>Tên sản phẩm</th>
		<th>Thao tác</th>
	</tr>

	<!--{foreach from=$products item=product}-->
		<tr>
			<td><!--{$product.product_id|h}--></td>
			<td><!--{$product.name|h}--></td>
			<td><a href="<!--{$smarty.const.P_DETAIL_URLPATH}--><!--{$product.product_id}-->">Chi tiết</a></td>
		</tr>
	<!--{/foreach}-->
</table>

<!--{include file='./headerkhoi.tpl'}-->
