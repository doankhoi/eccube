<script type="text/javascript">
	function fnChangeName(name){
		fnSetVal('name', name);
		fnSetVal('pageno', 1);
		fnSubmit();
	}

</script>

Danh sách tên gợi ý: 
<!--{foreach from=$arrKeyword item=i}-->
<a href="javascript:fnChangeName('<!--{$i}-->');"><!--{$i}--></a> &nbsp;
<!--{/foreach}-->