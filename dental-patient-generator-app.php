<?php
/*
Plugin Name:  Dental Optimizer Patient Generator App
Plugin URI: http://www.dentaloptimizer.com
Description:  Patient Generator helps you help the people who need your services. Install this widget for free and create your own custom version of this web application which can be placed in your website.
Author: Healthygrid
Version: 1.0
Author URI: http://www.dentaloptimizer.com
*/
	$siteurl='';
	$siteurlremote='';
	$default_widget_key='';
	$ps_dwc_foldername='';
	$ps_dwc_plugin_abs='';
	$ps_dwc_plugin_url='';
	$ps_dwc_plugin_options='';
	$ps_userid='';
	$ps_dwc_step='';
	$ps_dwc_plugin_page_url='';
	$ps_msg='';
	$ps_widgetid='';
	
	$siteurl=get_bloginfo('url');
	$siteurlremote='http://www.dentaloptimizer.com';
	
	$default_widget_key='wb5f65fy46crski6nxsev';
	
	$ps_dwc_foldername = dirname(plugin_basename(__FILE__));
	
	$ps_dwc_plugin_abs=trailingslashit( str_replace("\\","/", WP_PLUGIN_DIR . '/' . plugin_basename( dirname(__FILE__) ) ) );
	$ps_dwc_plugin_abs=dirname($ps_dwc_plugin_abs).'/'.$ps_dwc_foldername;
	
	$ps_dwc_plugin_url=trailingslashit( plugins_url( '', __FILE__ ) );
	$ps_dwc_plugin_url=dirname($ps_dwc_plugin_url).'/'.$ps_dwc_foldername;
	
	$ps_dwc_plugin_page_url=site_url().'/wp-admin/admin.php?page=ps-dwc-settings';
	
	add_shortcode("ps-dental-widget-code", "ps_dwc_handler");
	register_activation_hook(__FILE__,'set_ps_dwc_options');
	add_action('admin_menu', 'ps_dwc_create_menu');
	add_filter('plugin_action_links', 'ps_dwc_plugin_action_links', 10, 2);
	
	$ps_dwc_plugin_options=get_option('ps_dwc');
	if($ps_dwc_plugin_options=="")
	{
		$arr['color']='green';
		$arr['widgetid']='0';
		$arr['userid']='0';
		add_option('ps_dwc',$arr);
	}
	$ps_dwc_plugin_options=get_option('ps_dwc');
	
	$ps_userid=$ps_dwc_plugin_options['userid'];
	
	add_action( 'wp_ajax_setuserinfo', 'setuserinfo_callback' );
	add_action('wp_ajax_nopriv_setuserinfo', 'setuserinfo_callback');
	
	add_action( 'wp_ajax_setwidgetinfo', 'setwidgetinfo_callback' );
	add_action('wp_ajax_nopriv_setwidgetinfo', 'setwidgetinfo_callback');
	
	add_action( 'admin_footer', 'ps_dwc_javascript_block' );
	add_action('admin_head', 'ps_dwc_css_block');
	
	function setuserinfo_callback() {
		global $wpdb; // this is how you get access to the database
		ob_get_clean();
		$ps_userid=$_POST['userid'];
		$arr['widgetid']=$_POST['widgetid'];
		$arr['userid']=$ps_userid;
		$arr['color']='green';
		update_option('ps_dwc',$arr);
		die();
	}
	
	function setwidgetinfo_callback() {
		global $wpdb; // this is how you get access to the database
		ob_get_clean();
		$arr['userid']=$_POST['userid'];
		$arr['color']=$_POST['widgetcolor'];
		$arr['widgetid']=$_POST['widgetid'];
		update_option('ps_dwc',$arr);
		$ps_msg='1';
		$arr1['status']='success';					
		$arr1['widgetid']=$_POST['widgetid'];
		echo json_encode($arr1);
		die();
	}
	
	
	function ps_dwc_plugin_scripts() {
		wp_enqueue_style( 'posin1',plugins_url( '/css/ps_dwc.css' , __FILE__ ));
		wp_enqueue_script( 'script-name', plugins_url( '/js/ps_dwc.js' , __FILE__ ), array(), '1.0.0', true );
	}

	add_action( 'admin_enqueue_scripts', 'ps_dwc_plugin_scripts' );
	
	function ps_dwc_css_block()
	{
?>
		<style type="text/css">
			#ps_dwc_plugin{
				width:99%;
			}
			#ps_dwc_plugin .ps_usage{
				background-color:#F4F4F4;
				border:1px dotted #999999;
				margin-top:10px;
				padding:0 30px 15px;
			}
		</style>
<?php					
	}
	function ps_dwc_javascript_block() 
	{ 
		global $ps_dwc_plugin_page_url, $ps_dwc_plugin_url, $siteurlremote, $default_widget_key, $ps_userid, $ps_widgetid, $ps_dwc_plugin_options, $ps_dwc_step;
?>
		<script type="text/javascript" >
			var base_url = '<?php echo site_url(); ?>';
			var siteurlremote='<?php echo $siteurlremote;?>';
			var ps_dwc_plugin_url='<?php echo $ps_dwc_plugin_url;?>';
			var ps_dwc_plugin_page_url='<?php echo $ps_dwc_plugin_page_url;?>';
			var default_widget_key='<?php echo $default_widget_key;?>';
			var ps_userid='<?php echo $ps_userid;?>';	
			var ps_dwc_step='<?php echo $ps_dwc_step;?>';
			var ps_widgetid='<?php echo $ps_widgetid;?>';
		</script> 
<?php
	}
	function set_ps_dwc_options()
	{
		$arr['color']='green';
		$arr['widgetid']='0';
		$arr['userid']='0';
		add_option('ps_dwc',$arr);
	}
	function ps_dwc_handler()
	{
		$demolph_output = ps_dwc_function();
		return $demolph_output;
	}
	function ps_dwc_function()
	{
  		global $wpdb, $ps_map_foldername,$ps_map_plugin_abs,$ps_map_plugin_url,$siteurl,$siteurlremote;
		$ps_dwc_plugin_options=get_option('ps_dwc');
		$ps_widgetid=$ps_dwc_plugin_options['widgetid'];
		$ps_widgetcolor=$ps_dwc_plugin_options['color'];
		
		ob_start();
		if($ps_widgetid=='' || $ps_widgetid=='0')
		{
			echo '<div>Please setup plugin in admin section.</div>';
		}
		else
		{
		?>
		<div id="wi_dental_cont"></div>
		<script language="javascript" type="text/javascript" src="<?php echo $siteurlremote;?>/ps-dental-widget-js.php?u=<?php echo $ps_widgetid?>&color=<?php echo $ps_widgetcolor;?>"></script>
		<?php
		}
		$html=ob_get_clean();
  		return $html;
	}
	function ps_dwc_create_menu()
	{
		global $menu;
		add_menu_page('PS Dental Plugin Settings', 'Dental Widget', 'administrator','ps-dwc-settings', 'ps_dwc_settings',plugins_url('/images/icon.png', __FILE__));
		add_action( 'admin_init', 'register_dwc_settings' );
	}
	function register_dwc_settings()
	{
		register_setting( 'ps-dwc-settings-group', 'ps_dwc' );
	}
	if (!function_exists("ob_get_clean")) {
		function ob_get_clean() {
			$ob_contents = ob_get_contents();
			ob_end_clean();
			return $ob_contents;
		}
	}
	
	function ps_dwc_settings()
	{
		global $ps_dwc_plugin_url, $ps_dwc_plugin_abs, $siteurlremote, $siteurl, $default_widget_key, $current_user, $ps_dwc_step,$ps_msg, $ps_dwc_plugin_page_url, $ps_widgetid, $ps_userid;
		
		$ps_dwc_plugin_options=get_option('ps_dwc');
		$ps_color=$ps_dwc_plugin_options['color'];
		$ps_userid=$ps_dwc_plugin_options['userid'];
		$ps_widgetid=$ps_dwc_plugin_options['widgetid'];
		$psmsg='';
		
		if(isset($_GET['step']) && $_GET['step']!='')
		{
			$ps_dwc_step=$_GET['step'];
			if($ps_dwc_step==1 || $ps_dwc_step==2)
			{
				if($ps_userid=="" || $ps_userid=='0')
					header('Location:'.$ps_dwc_plugin_page_url);
				else if($ps_dwc_step==2 && ($ps_widgetid=='' || $ps_widgetid=='0'))
					header('Location:'.$ps_dwc_plugin_page_url);
			}
			else
				header('Location:'.$ps_dwc_plugin_page_url);
		}
		else
		{
			if($ps_userid=="" || $ps_userid=='0')
				$ps_dwc_step='-1';
			else
			{
				if($ps_widgetid=='' || $ps_widgetid=='0')
					$ps_dwc_step='1';
				else
					$ps_dwc_step='2';
			}
		}
		?>
			<div id="ps_dwc_plugin">
			<?php
				if($ps_dwc_step=='-1')
					include($ps_dwc_plugin_abs . '/authentication.php');
				elseif($ps_dwc_step=='1')
					include($ps_dwc_plugin_abs . '/step1.php');
				elseif($ps_dwc_step=='2')
					include($ps_dwc_plugin_abs . '/step2.php');
			?>
			<?php
				if($ps_msg=='1')
				{
			?>
				<div id="message" class="updated">
					<p><?php _e('Dental widget settings has been updated successfully.', 'ps_dwc' );?></p>
				</div>
			<?php
				}
			?>
			</div>
		<?php
	}
	function ps_dwc_plugin_action_links($links, $file)
	{
		static $this_plugin;
		if (!$this_plugin) {
			$this_plugin = plugin_basename(__FILE__);
		}
		if ($file == $this_plugin) {
			$settings_link = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=ps-dwc-settings">Settings</a>';
			array_unshift($links, $settings_link);
		}
		return $links;
	}
/*
	Widget Code Start
*/
class dental_widget_code_widget extends WP_Widget
{
	function dental_widget_code_widget()
	{
		$widget_ops = array('classname' => 'widget_dentalcodewi', 'description' => __('Display dental widget'));
		$control_ops = array('width' => 400, 'height' => 350);
		$this->WP_Widget('dentalcodewi', __('Dental Widget'), $widget_ops, $control_ops);
	}
	function widget( $args, $instance ) {
		extract($args);
		global $siteurlremote;
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );
		$text = apply_filters( 'widget_execphp', $instance['text'], $instance );
		echo $before_widget;
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; }
		$ps_dwc_plugin_options=get_option('ps_dwc');
		$ps_widgetid=$ps_dwc_plugin_options['widgetid'];
		$ps_widgetcolor=$ps_dwc_plugin_options['color'];
		if($ps_widgetid=='' || $ps_widgetid=='0')
		{
			echo '<div style="background-color:#CCCCCC;border:1px solid #AAAAAA;height:394px;width:280px;"><div style="padding-top:40px;margin:0px auto;width:200px;color:BLACK;font-weight:bold;font-size:15px;">Please setup plugin in admin section.</div></div>';
		}
		else
		{
		?>
		<div class="widget_dentalcodewi">
			<div id="wi_dental_cont"></div>
		</div>
		<script language="javascript" type="text/javascript" src="<?php echo $siteurlremote;?>/ps-dental-widget-js.php?u=<?php echo $ps_widgetid?>&color=<?php echo $ps_widgetcolor;?>"></script>
		<?php
		}
		?>
		<?php
		echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( $new_instance['text'] ) );
		$instance['filter'] = isset($new_instance['filter']);
		return $instance;
	}
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$title = strip_tags($instance['title']);
		$text = format_to_edit($instance['text']);
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
<?php
	}
}
add_action('widgets_init', create_function('', 'return register_widget("dental_widget_code_widget");'));
?>