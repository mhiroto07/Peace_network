<?php

get_header();
$author_id   = get_queried_object_id();
$author_data = get_userdata( $author_id );

// リストタイプ
$list_type = apply_filters( 'arkhe_list_type_on_author', ARKHE_LIST_TYPE, $author_id );

?>
<main id="main_content" class="<?php Arkhe::main_class(); ?>">
	<div <?php post_class( Arkhe::main_body_class( false ) ); ?>>
		<h1 class="p-archive__title c-pageTitle"><?php echo esc_html( $author_data->display_name ); ?></h1>
		<?php
			// 著者情報
			Arkhe::get_parts( 'others/author_box', array( 'author_id' => $author_id ) );

			// 投稿リスト
			Arkhe::get_parts( 'post_list/main_query', array( 'list_type' => $list_type ) );

			// ページャー
			the_posts_pagination(
				array(
					'mid_size'           => 2,
					'screen_reader_text' => null,
				)
			);
		?>
	</div>
</main>
<?php get_footer(); ?>
