<?php
/**
 * アーカイブタイトルを出力する
 *   $args['title'] : アーカイブタイトル
 *   $args['type'] : アーカイブ種別 (フック用)
 */
$the_title = isset( $args['title'] ) ? $args['title'] : '';
?>
<h1 class="p-archive__title c-pageTitle"><?php echo esc_html( $the_title ); ?></h1>
