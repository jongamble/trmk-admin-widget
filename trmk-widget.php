<?php
 /******
 * Plugin Name: Trimark Digital Admin Widget
 * Description: Adds quick and easy contact information for Trimark Digital on the Dashboard of all wordpress sites created by us.
 * Version: 1.0
 * Author: Trimark Digital
 * Author URI: http://www.trimarkdigital.com
 * License: MIT
 * License URI: http://opensource.org/licenses/MIT
 ******/


/* VERSION CHECK
 * WP 3.2 admin logo size changed form 32x32 to 16x16 
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
global $wp_version;
$exit_msg='Trimark Admin requires WordPress 3.2 or newer.
<a href="http://codex.wordpress.org/Upgrading_WordPress">Please update!</a>';
if (version_compare($wp_version,"3.2","<")) {
	exit ($exit_msg);
}

/*******
* Adding styles for the plugin
*******/
function trmk_admin_head() {
	$css_file = plugins_url( '/style/trmk-widget.css', __FILE__ );
	echo '<link rel="stylesheet" type="text/css" href="'.$css_file.'">';
}
add_action( 'admin_head', 'trmk_admin_head' );



function trmk_build_widget() { ?>
	<img class="trimark-logo" src="<?php echo plugins_url( '/images/logo-trimark-digital.jpg', __FILE__); ?>" />
	<p class="trimark-copy">This website was developed by Trimark Digital. Got questions about your website? Call Us at 919-785-2275 or shoot us an email at 
		<a href="mailto:managers@trimarkdigital.com?subject=Admin Widget Contact Form from <?php echo get_bloginfo( 'wpurl' ); ?>">managers@trimarkdigital.com</a>.</p>
<?php }

function trmk_init_widget() {
	add_meta_box('trmk_widget', 'Trimark Digital', 'trmk_build_widget', 'dashboard', 'side', 'high' );
}

add_action( 'wp_dashboard_setup', 'trmk_init_widget' );

?>