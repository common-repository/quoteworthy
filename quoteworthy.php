<?php
/*
Plugin Name: QuoteWorthy
Plugin URI: http://www.shannon-green.com/posts/25
Description: Takes a newline-separated list of quotes/lyrics/whatever and displays a random one in the sidebar as a widget. Configuration page is under Settings or Options.
Author: Shannon Green
Version: 1.1
Author URI: http://www.shannon-green.com
*/

function qw_init() {
    global $qw_chosen;
    $quotes = get_option('qw_list');
    $quotes = explode("\n", $quotes);
    $qw_chosen = wptexturize( $quotes[ mt_rand(0, count($quotes) - 1) ] );
	
    register_sidebar_widget('QuoteWorthy', 'widget_quoteworthy');
}

add_action('plugins_loaded','qw_init');

function widget_quoteworthy($args) {
    global $qw_chosen;
    extract($args);
    echo $before_widget;
    echo $before_title . get_option('qw_title') . $after_title;        

    $quotes = get_option('qw_list');
    $quotes = explode("\n", $quotes);
    $qw_chosen = wptexturize( $quotes[ mt_rand(0, count($quotes) - 1) ] );

    echo get_option('qw_before_quote') . $qw_chosen . get_option('qw_after_quote');
    echo $after_widget;
}

function qw_add_pages() {
	add_options_page('QuoteWorthy', 'QuoteWorthy', 8, 'quoteoptions', 'qw_options_page');
}
add_action('admin_menu', 'qw_add_pages');

function qw_options_page() { ?>

	<div class="wrap">
	<h2>QuoteWorthy Options</h2>
	<form method="post" action="options.php">
	<?php wp_nonce_field('update-options'); ?>
	<table class="form-table">
<tr>
         <th valign="top">Title of widget:</th>
	<td><input type="text" name="qw_title" value="<?php echo get_option('qw_title'); ?>" /></td>
</tr>
<tr>
         <th valign="top">Before quote:</th>
	<td>Text or HTML you want placed before the random quote - for example, &lt;p class='...'&gt; or &lt;div style='...'&gt;. Can safely be left blank. <br />
<input type="text" name="qw_before_quote" value="<?php echo get_option('qw_before_quote'); ?>" /></td>
</tr>
<tr>
         <th valign="top">After quote:</th>
	<td>Text you want placed after the random quote. Don't forget to close any HTML tags you've started.<br />
<input type="text" name="qw_after_quote" value="<?php echo get_option('qw_after_quote'); ?>" /></td>
</tr>
<tr>
	<th valign="top">Quotes</th>
	<td>Quotes should be newline-separated. You can use HTML tags like &lt;br /&gt; if you want.
<textarea name="qw_list" cols="100" rows="20" ><?php echo get_option('qw_list'); ?></textarea></td>
</tr>
<tr><td>&nbsp;</td><td>
	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="qw_title,qw_list,qw_before_quote,qw_after_quote" />
	<span class="submit">
	<input type="submit" name="Submit" value="<?php _e('Update Options &raquo;') ?>" />
	</span>
</td></tr>
         </table>
	</form>
</div>
<?php
}
?>