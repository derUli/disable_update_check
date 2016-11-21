<?php
define ( "MODULE_ADMIN_HEADLINE", get_translation ( "disable_update_check" ) );
define ( "MODULE_ADMIN_REQUIRED_PERMISSION", "disable_update_check" );
function disable_update_check_admin() {
	if (isset ( $_POST ["submit"] )) {
		if (isset ( $_POST ["disable_package_update_check"] )) {
			Settings::set ( "disable_package_update_check", "disable_package_update_check" );
		} else {
			Settings::delete ( "disable_package_update_check" );
		}
	}
	
	$disable_package_update_check = Settings::get ( "disable_package_update_check" );
	$disable_core_update_check = Settings::get ( "disable_core_update_check" );
	$disable_core_patch_check = Settings::get ( "disable_core_patch_check" );
	$disable_ulicms_newsfeed = Settings::get ( "disable_ulicms_newsfeed" );
	?>

<form action="<?php echo getModuleAdminSelfPath();?>" method="post">
	<p>
		<input type="checkbox" name="disable_package_update_check"
			id="disable_package_update_check" value="1"
			<?php if($disable_package_update_check) echo " checked";?>> <label
			for="disable_package_update_check"><?php translate("disable_package_update_check");?></label>
	</p>
	<?php csrf_token_html();?>
	
	
	
	<p>
		<input type="submit" name="submit"
			value="<?php translate("save_changes")?>">
	</p>
</form>
<?php
}

?>
