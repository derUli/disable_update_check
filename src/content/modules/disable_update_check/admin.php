<?php
define ( "MODULE_ADMIN_HEADLINE", get_translation ( "disable_update_check" ) );
define ( "MODULE_ADMIN_REQUIRED_PERMISSION", "disable_update_check", "disable_ulicms_newsfeed" );
function disable_update_check_admin() {
	if (isset ( $_POST ["submit"] )) {
		$settings = array("disable_core_patch_check", "disable_ulicms_newsfeed");
		foreach($settings as $setting){
			if (isset ( $_POST [$setting] )) {
				Settings::set ( $setting, $setting );
			} else {
				Settings::delete ( $setting );
			}
	}
}
	$disable_core_patch_check = Settings::get ( "disable_core_patch_check" );
	$disable_ulicms_newsfeed = Settings::get ( "disable_ulicms_newsfeed" );
	?>

<form action="<?php echo getModuleAdminSelfPath();?>" method="post">
	<p>
		<input type="checkbox" name="disable_core_patch_check"
			id="disable_core_patch_check" value="1"
			<?php if($disable_core_patch_check) echo " checked";?>> <label
			for="disable_core_patch_check"><?php translate("disable_core_patch_check");?></label>
	</p>
	<p>
		<input type="checkbox" name="disable_ulicms_newsfeed"
			id="disable_ulicms_newsfeed" value="1"
			<?php if($disable_ulicms_newsfeed) echo " checked";?>> <label
			for="disable_ulicms_newsfeed"><?php translate("disable_ulicms_newsfeed");?></label>
	</p>
	<?php csrf_token_html();?>
	<p>
		<button type="submit" name="submit" class="btn btn-primary">
		<i class="fa fa-save"></i> <?php translate("save_changes")?></button>
	</p>
</form>
<?php
}

?>
