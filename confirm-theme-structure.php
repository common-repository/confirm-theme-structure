<?php
/**
 * Plugin Name: Confirm Theme Structure
 * Plugin URI:  https://seous.info/wp-plugin/6507
 * Description: A simple plugin that can display a list of templates used to display WordPress
 * Version:     2.1.1
 * Author:      R3098
 * Author URI:  https://seous.info/
 * License:     GPLv2
 * Text Domain: confirm-theme-structure
 */

/*
Copyright 2015 r3098 (email : info@seous.info)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

define( 'ConfirmThemeStructureVersion', 1.5 );

add_action(
	'admin_bar_menu',
	function ( $wp_admin_bar ) {
		if ( is_admin() ) {
			return;
		}
		$wp_admin_bar->add_menu( [
			'id'    => 'confirm-theme-structure',
			'title' => __( 'CTS Page Display Info', 'confirm-theme-structure' ),
			'href'  => '#'
		] );
	},
	9999
);

add_action( 'wp_enqueue_scripts', function() {
	if ( is_user_logged_in() && current_user_can( 'administrator' ) ) {
		wp_enqueue_script(
			'confirm-theme-structure-script',
			plugins_url( 'js/confirm-theme-structure.js', __FILE__ ),
			array( 'jquery' ),
			ConfirmThemeStructureVersion
		);
	}
} );

add_action( 'plugins_loaded', function() {
	load_plugin_textdomain(
		'confirm-theme-structure',
		false,
		plugin_basename( dirname( __FILE__ ) . '/languages' )
	);
});

add_action(
	'wp_footer',
	function() {
		if ( is_user_logged_in() && current_user_can( 'administrator' ) ) {
			global $template, $wpdb;
			$theme		 = wp_get_theme();
			$active_theme	 = __( 'Active', 'confirm-theme-structure' ) . ':' . $theme;
			$parent_theme = $theme->parent();
			if ( $parent_theme)  {
				$active_theme	 = __( 'Active', 'confirm-theme-structure' ) . ':' .
					$theme . '(' . __( 'Child theme', 'confirm-theme-structure' ) . ')/' .
					$parent_theme->Name . '(' . __( 'Parent theme', 'confirm-theme-structure' ) . ')' ;
			}
      $template_name = basename( $template, '.php' );
			$blog_info     = get_bloginfo( 'version' );
			$inc_file_list = get_included_files();

			$wp_version             = __( 'WP version', 'confirm-theme-structure' ) . ":" . $blog_info;
			$display_template       = __( 'Display template', 'confirm-theme-structure' ) . ":" . $template_name . ".php";
			$php_version            = __( 'PHP version', 'confirm-theme-structure') . ":" . phpversion();
      $message                = __( 'This information is only displayed when logged in by Confirm Theme Structure.', 'confirm-theme-structure' );
      $message_alert          = __( 'Only Classic Theme can get this information correctly.<br>This is Block Theme.<br>It recognizes PHP templates, but Block Theme reads other files such as html files from the template directory and the parts directory in Theme.', 'confirm-theme-structure' );
      $configuration_template = __('Configuration template', 'confirm-theme-structure');
			$wordpress_info = __('WordPress', 'confirm-theme-structure');
      $server_ip = __('Server IP address', 'confirm-theme-structure');
			$theme_name = __('Theme', 'confirm-theme-structure');
			$database_info = __('Database info', 'confirm-theme-structure');

			$db_name   = __( 'Datebase', 'confirm-theme-structure' ) . ":" . $wpdb->dbname;
			$db_version = mysqli_get_server_info($wpdb->dbh);
			if ( ! $db_version ) {
				if ( method_exists( $wpdb, 'db_version' ) ) {
					$db_version = $wpdb->db_version();
				} else {
					$db_version = mysqli_get_server_version( $wpdb->dbh );
				}
			}
      $mysqlVersion = __( 'MySQL version', 'confirm-theme-structure' ) . ":" . $db_version;
      $db_prefix = __('Table prefix', 'confirm-theme-structure'). ':' . $wpdb->prefix;
      global $wpdb;
      $db_usage_capacity = $wpdb->get_var( 'SELECT SUM(data_length + index_length) FROM information_schema.tables WHERE table_schema = database()' );
      $db_size = __('Data size', 'confirm-theme-structure'). ':' . round( $db_usage_capacity / 1024 / 1024 ,2).'&thinsp;MB';
?>
    <div id="CTS_template_info_wrapper">
        <div class="CTS_template_info"> 
        <p><?php echo $message; ?></p>
        </div>
        <div class="CTS_template_info">
          <p><b><?php echo $server_ip; ?></b></p>
          <p><?php echo $_SERVER[ 'SERVER_ADDR' ];?></p>
					<p><b><?php echo $theme_name; ?></b></p>
					<p><?php echo $active_theme; ?></p>
					<p><?php echo $display_template; ?></p>
					<p><b><?php echo $wordpress_info; ?></b></p>
          <p><?php echo $wp_version; ?></p>
					<p><?php echo $php_version; ?></p>
					<p><b><?php echo $database_info; ?></b></p>
					<p><?php echo $mysqlVersion; ?></p>
          <p><?php echo $db_name; ?></p>
          <p><?php echo $db_prefix; ?></p>
          <p><?php echo $db_size; ?></p>
				</div>
        <div class="CTS_template_info">
					<p><b><?php echo $configuration_template; ?></b></p>
<?php
if(wp_is_block_theme()){
  echo '<p>'.$message_alert.'</p>';
}
  echo '<ol>';
require_once ABSPATH . '/wp-admin/includes/file.php';
$home_path     = get_home_path();
$home_path_len = strlen( $home_path );
sort( $inc_file_list, SORT_NATURAL );
foreach ( $inc_file_list as $path ) {
  if ( 0 !== strncmp( $path, $home_path, $home_path_len ) ) {
    continue;
  }
  $path = substr( $path, $home_path_len );
  if ( stristr( $path, '/themes/' ) || stristr( $path, '/templates/' ) ) {
    echo '<li>' . esc_html( $path ) . '</li>' . PHP_EOL;
  }
}
echo '</ol>';
?>
				</div>
		  	<div id="CTS_close_toggle">Close</div>
		</div>
    <style>
    #CTS_close_toggle {
    font-size: 16px;
    position: fixed;
    bottom: 10px;
    right: 40px;
    }
    #CTS_close_toggle:before {
    font-family: "dashicons";
    content: "\f335";
    vertical-align: middle;
    }
    #wpadminbar #wp-admin-bar-confirm-theme-structure>.ab-item:before {
      content: "\f348";
      top: 2px;
    }
		#CTS_template_info_wrapper {
      width: 100%;
      height:100%;
      font-size: 12px;
      color: #000;
			position: fixed;
			top: 0px;
			padding-top: 30px;
			background: rgba(255,192,192,0.9);
			display:none;
			overflow-y:scroll;
			z-index: 9999;
		}
		.CTS_template_info {
			padding: 0 40px 5px;
      }
    .CTS_template_info:first-child {
			padding-top: 30px;
      }
		.CTS_template_info:nth-child(3) {
			padding-bottom: 80px;
			}
		#CTS_template_info_wrapper p {
			margin: 0 0 4px;
			font-size: 14px;
		}
    .CTS_template_info p {
			font-size: 14px;
			margin : 0 0 0 4px;
		}
		.CTS_template_info b {
      background: linear-gradient(transparent 60%, #ffff66 60%);
    }
    .CTS_template_info ol {
			list-style-position: inside;
			font-size: 14px;
			margin: 0;
			padding: 0;
		}
		</style>
<?php
		}
	}
);

