<?php echo js_tag('vendor/tinymce/tinymce.min'); ?>

<script type="text/javascript">
	jQuery(document).ready(function () {
		Omeka.wysiwyg({
			selector: '.html-editor'
		});
	});
</script>

<?php
$site_message_stmt = get_option('site_message_stmt');
$site_message_stmt_ttl = get_option('site_message_stmt_ttl');
$public_body = get_option('public_body');
$public_collections_browse = get_option('public_collections_browse');
$public_collections_browse_each = get_option('public_collections_browse_each');
$public_collections_show = get_option('public_collections_show');
$public_content_top = get_option('public_content_top');
$public_footer = get_option('public_footer');
$public_header = get_option('public_header');
$public_home = get_option('public_home');
$public_items_browse = get_option('public_items_browse');
$public_items_browse_each = get_option('public_items_browse_each');
$public_items_search = get_option('public_items_search');
$public_items_show = get_option('public_items_show');
$background_color = get_option('background_color');
$inserts = array(
"public_body" => array(
        "Allows plugins to hook in to the top of the <body> of public themes. Content added with this hook will appear at the very top of the <body>, outside any other markup on the page."
    ),
"public_collections_browse" => array(
        "Append content at the end of the collections browse page."
    ),
"public_collections_browse_each" => array(
        "Adds content at the end of each collection on the public collections browse page, before the link to the collection."
    ),
"public_collections_show" => array(
        "Append content to the end of a collections show page."
    ),
"public_content_top" => array(
        "Inserts content at the top of the page."
    ),
"public_footer" => array(
        "Add content to the end of the public footer."
    ),
"public_home" => array(
        "Add content at the end of the home page."
    ),
"public_items_browse" => array(
        "Append content to the items browse page."
    ),
"public_items_browse_each" => array(
        "Append content to each item in the items browse page."
    ),
"public_items_search" => array(
        "Use this hook to add form elements to the advanced search form."
    ),
"public_items_show" => array(
        "Add content to the items show page."
    ),
"public_header" => array(
        "Adds content at the beginning of the &#8249;header&#8250; element, before the header image."
    )
);
$view = get_view();
?>

<div class="field">
    <h3>Site Message Title</h3>
    <div class="inputs">
        <?php echo $view->formTextarea('site_message_stmt_ttl', $site_message_stmt_ttl, array('rows' => '1', 'cols' => '30', 'class' => array('textinput'))); ?>
        <p class="explanation">
            Edit/create the title for your Site Message.
        </p>
    </div>
</div>

<div class="field">
    <h3>Site Message</h3>
    <div class="inputs">
        <?php echo $view->formTextarea('site_message_stmt', get_option('site_message_stmt'), array('rows' => '5', 'cols' => '30', 'class' => array('html-editor'))); ?>
        <p class="explanation">
            Edit/create your Site Message.
        </p>
    </div>
</div>

<div class="field">
    <h3>Background color for site message box.</h3>
    <div class="inputs">
        <?php echo $view->formTextarea('background_color', $background_color, array('rows' => '1', 'cols' => '30', 'class' => array('textinput'))); ?>
        <p class="explanation">
            Enter/edit CSS color code to set background color for the message box.
        </p>
    </div>
</div>

<div class="field">
    <h3>Placement</h3> 
        <p class="explanation"><?php echo __("If checked, site message will display in selected public view(s)."); ?></p>
        <?php 
        $keys = array_keys($inserts);
        for($i = 0; $i < count($inserts); $i++) {
            foreach($inserts[$keys[$i]] as $value):
                echo "<div class=\"two columns alpha\">";
                echo $view->formCheckbox("$keys[$i]", get_option("$keys[$i]"), null, array('1', '0'));
            	echo "</div><div class=\"inputs five columns omega\">&nbsp;<strong>" . $keys[$i] . "</strong><p>" . $value . "</p></div>";
            endforeach;
        };
        ?>
</div>
