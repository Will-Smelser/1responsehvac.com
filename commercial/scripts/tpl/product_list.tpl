<ul class="tpl_plist">
    {loop:start:product_types}
    <li>
    	<table><tr><td valign="top" class="image">
    	<h2>{type_desc}</h2>
        <img src="{image_url}" width="100" />
        </td><td class="desc">
        <table class="desc_table">
        {loop:start:product_info}
            	{summary}
        {loop:end:product_info}
        </table>
        </td></tr></table>
    </li>
    {loop:end:product_types}
</ul>