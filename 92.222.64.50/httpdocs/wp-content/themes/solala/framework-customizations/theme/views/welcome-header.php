<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}
$page = SLZ_Request::GET('page');
?>
<div class="uns-featured-section">
	<h2 class="heading-title"><?php echo esc_html__('Welcome to', 'solala'); ?> <?php echo esc_html( slz()->theme->manifest->get('name') ); ?></h2>
	<div class="description">
		<?php echo esc_html( slz()->theme->manifest->get('description') ); ?>
		<div class="slz-notice">
			<p><?php echo esc_html__('Please kindly DO NOT update Unyson Plugin separately!', 'solala');?></p>
			<p><?php echo esc_html__('We had customized its coding structure and create it a our own unique technique, if you update it, it will turn your site into "Forbidden" state and let your site DOWN.', 'solala');?></p>
		</div>
	</div>
	
	<ul class="nav nav-tabs nav-justified">
		<li <?php echo ($page==slz()->theme->manifest->get('id') ? 'class="active"': '') ?>>
			<a href="<?php echo esc_url ( admin_url( 'admin.php?page=' . slz()->theme->manifest->get('id') ) ); ?>">
				<span><?php echo esc_html__('Plugins', 'solala'); ?></span>
			</a>
		</li>
		<li <?php echo ($page==slz()->theme->manifest->get('log_page_id') ? 'class="active"': '') ?>>
			<a href="<?php echo esc_url ( admin_url( 'admin.php?page=' . slz()->theme->manifest->get('log_page_id') ) ); ?>">
				<span><?php echo esc_html__('Changes Log', 'solala'); ?></span>
			</a>
		</li>
		<li>
			<a href="<?php echo esc_url ( admin_url( 'admin.php?page=' . slz()->extensions->manager->get_page_slug() ) ); ?>">
				<span><?php echo esc_html__('Extension Manager', 'solala'); ?></span>
			</a>
		</li>
		<li>
			<a href="<?php echo esc_url ( admin_url( 'admin.php?page=' . slz()->backend->_get_settings_page_slug() ) ); ?>">
				<span><?php echo esc_html__('Theme Settings', 'solala'); ?></span>
			</a>
		</li>
		<?php if ( slz()->extensions->_get_db_active_extensions('backups') ) : ?>
			<li>
				<a href="<?php echo esc_url ( admin_url( 'admin.php?page=' . slz_ext('backups')->get_page_slug() ) ); ?>">
					<span><?php echo esc_html__('Backup Data', 'solala'); ?></span>
				</a>
			</li>
		<?php endif; ?>
		<?php if ( slz()->extensions->_get_db_active_extensions('backups-demo') ) : ?>
			<li>
				<a href="<?php echo esc_url ( admin_url( 'admin.php?page=' . slz_ext('backups-demo')->get_page_slug() ) ); ?>">
					<span><?php echo esc_html__('Demo Install', 'solala'); ?></span>
				</a>
			</li>
		<?php endif; ?>
	</ul>
</div>