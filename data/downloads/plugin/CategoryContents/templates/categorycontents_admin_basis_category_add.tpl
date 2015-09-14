<!--{*
 * CategoryContents
 * Copyright (C) 2012 LOCKON CO.,LTD. All Rights Reserved.
 * http://www.lockon.co.jp/
 * 
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *}-->

<!--PLG:CategoryContents↓-->
<div  class="now_dir">
    <table>
        <tr>
            <th>カテゴリ</th>
            <td>
                <!--{if $arrErr.category_name}-->
                <span class="attention"><!--{$arrErr.category_name}--></span>
                <!--{/if}-->
                <input type="text" name="category_name" value="<!--{$arrForm.category_name|h}-->" size="30" class="box30" maxlength="<!--{$smarty.const.STEXT_LEN}-->" />
                <span class="attention">&nbsp;（上限<!--{$smarty.const.STEXT_LEN}-->文字）</span>
            </td>
        </tr>
        <tr>
            <th>コンテンツ<br/><span class="attention"> (タグ許可)</span></th>
            <td>
                <span class="attention"><!--{$arrErr.plg_categorycontents_category_contents}--></span>
                <textarea name="plg_categorycontents_category_contents" cols="80" rows="10" class="area80"><!--{$arrForm.plg_categorycontents_category_contents|h}--></textarea>
            </td>
        </tr>
    </table>
    <a class="btn-normal" href="javascript:;" onclick="fnModeSubmit('edit','',''); return false;"><span class="btn-next">登録</span></a>
</div>
<!--PLG:CategoryContents↑-->