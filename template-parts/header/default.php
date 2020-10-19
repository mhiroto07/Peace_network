<?php
/**
 * デフォルトヘッダー用テンプレート
 */
$setting         = Arkhe::get_setting();
$move_gnav_under = $setting['move_gnav_under'];
$attr_data       = array(
	'logo_pos'       => $move_gnav_under ? 'center' : 'left',
	'show_drawer_sp' => $setting['show_drawer_sp'],
	'show_drawer_pc' => $setting['show_drawer_pc'],
	'show_search_sp' => $setting['show_search_sp'],
	'show_search_pc' => $setting['show_search_pc'],
);
?>
<header id="header" class="l-header" <?php \Arkhe::header_attr( $attr_data ); ?>>
	<div class="l-header__body l-container">
		<?php \Arkhe::get_parts( 'header/drawer_btn' ); ?>
		<div class="l-header__left">
			<?php do_action( 'arkhe_haader_left_content' ); ?>
		</div>
		<?php \Arkhe::get_parts( 'header/logo' ); ?>
		<div class="l-header__right">
			<?php
				if ( ! $move_gnav_under ) :
					\Arkhe::get_parts( 'header/gnav' );
				endif;
				do_action( 'arkhe_haader_left_content' );
			?>
		</div>
		<?php \Arkhe::get_parts( 'header/search_btn' ); ?>
		<?php \Arkhe::get_parts( 'header/drawer_menu' ); ?>
	</div>
</header>
<?php if ( $move_gnav_under ) : ?>
	<div class="l-headerUnder" <?php if ( \Arkhe::get_setting( 'fix_gnav' ) )  echo ' data-fix="1"'; ?>>
		<div class="l-headerUnder__inner l-container">
			<?php \Arkhe::get_parts( 'header/gnav' ); ?>
		</div>
	</div>
<?php endif; ?>
