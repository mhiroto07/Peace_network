<?php
/**
 * 投稿ページのタイトル部分
 * $args['post_id'] : 投稿IDが渡ってくる
 */
$setting = Arkhe::get_setting();

$the_id    = isset( $args['post_id'] ) ? $args['post_id'] : get_the_ID();
$post_data = get_post( $the_id );
$date      = new DateTime( $post_data->post_date );
$modified  = new DateTime( $post_data->post_modified );

// 公開日 < 更新日かどうか
$is_modified = ( $date < $modified );

?>
<header class="p-entry__head">
	<h1 class="p-entry__title c-pageTitle"><?php the_title(); ?></h1>
	<div class="c-postMetas">
		<div class="c-postTimes">
			<?php Arkhe::the_date_time( $date, 'posted' ); ?>
			<?php
				if ( $is_modified ) :
					Arkhe::the_date_time( $modified, 'modified', false );
				endif;
			?>
		</div>
		<?php
			// カテゴリー・タグ
			Arkhe::get_parts(
				'single/term_list',
				array(
					'post_id'  => $the_id,
					'show_cat' => $setting['show_entry_cat'],
					'show_tag' => $setting['show_entry_tag'],
				)
			);

			// 著者アイコン
			if ( $setting['show_entry_author'] ) :
				$author_id   = $post_data->post_author;
				$author_data = get_userdata( $author_id );
				$author_url  = get_author_posts_url( $author_id );
			?>
				<a href="<?php echo esc_url( $author_url ); ?>" class="c-postAuthor">
					<figure class="c-postAuthor__figure">
						<?php echo get_avatar( $author_id, 100, '', '' ); ?>
					</figure>
					<span class="c-postAuthor__name"><?php echo esc_html( $author_data->display_name ); ?></span>
				</a>
			<?php endif; ?>
	</div>
	<?php
		// アイキャッチ画像
		if ( Arkhe::get_setting( 'show_entry_thumb' ) ) :
			Arkhe::get_parts(
				'singular/thumbnail',
				array(
					'post_id'    => $the_id,
					'post_title' => $post_data->post_title,
				)
			);
		endif;
	?>
</header>
<?php
// 記事上シェアボタン
do_action( 'arkhe_show_share_btn_top' );
