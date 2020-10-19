<?php
/**
 * グローバルナビ
 */

$gnav = wp_nav_menu(
	array(
		'container'       => '',
		'fallback_cb'     => '',
		'theme_location'  => 'header_menu',
		'items_wrap'      => '%3$s',
		'echo'            => false,
	)
);

if ( ! $gnav ) return; ?>
<nav id="gnav" class="c-gnavWrap">
	<ul class="c-gnav">
		<?php
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo $gnav;
		?>
	</ul>
</nav>
