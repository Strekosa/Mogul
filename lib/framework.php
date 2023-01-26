<?php
/**
 * Various functions required for mogul-bootstrap to work properly
 *
 * @package Mogul
 */

/*
 * Table of contests:
 * 1 - WP Content Width
 * 2 - Menu navigation walker
 * 3 - Pagination
 * 4 - Comments tree
 */

// 1 - WP Content Width @link {https://codex.wordpress.org/Content_Width}
if ( ! isset( $content_width ) ) {
	$content_width = 1140;
}
/**
 * mogul_navwalker class
 * Menu navigation walker
 * Class Name: mogul_navwalker
 * GitHub URI: https://github.com/twittem/wp-mogul-navwalker
 * Description: A custom WordPress nav walker class to implement the mogul 3 navigation style in a custom theme using the WordPress built in menu manager.
 */

//class Mogul_Navwalker extends Walker_Nav_Menu {
//	/*
//	 * Позволяет перезаписать <ul class="sub-menu">
//	 */
//	function start_lvl(&$output, $depth = 0, $args = NULL) {
//		/*
//		 * $depth – уровень вложенности, например 2,3 и т д
//		 */
//		$output .= '<ul class="sub-menu">';
//
//	}
//	/**
//	 * @see Walker::start_el()
//	 * @since 3.0.0
//	 *
//	 * @param string $output
//	 * @param object $item Объект элемента меню, подробнее ниже.
//	 * @param int $depth Уровень вложенности элемента меню.
//	 * @param object $args Параметры функции wp_nav_menu
//	 */
//	function start_el(  &$output, $item, $depth = 0, $args = NULL, $id = 0) {
//		global $wp_query;
//		/*
//		 * Некоторые из параметров объекта $item
//		 * ID - ID самого элемента меню, а не объекта на который он ссылается
//		 * menu_item_parent - ID родительского элемента меню
//		 * classes - массив классов элемента меню
//		 * post_date - дата добавления
//		 * post_modified - дата последнего изменения
//		 * post_author - ID пользователя, добавившего этот элемент меню
//		 * title - заголовок элемента меню
//		 * url - ссылка
//		 * attr_title - HTML-атрибут title ссылки
//		 * xfn - атрибут rel
//		 * target - атрибут target
//		 * current - равен 1, если является текущим элементом
//		 * current_item_ancestor - равен 1, если текущим (открытым на сайте) является вложенный элемент данного
//		 * current_item_parent - равен 1, если текущим (открытым на сайте) является родительский элемент данного
//		 * menu_order - порядок в меню
//		 * object_id - ID объекта меню
//		 * type - тип объекта меню (таксономия, пост, произвольно)
//		 * object - какая это таксономия / какой тип поста (page /category / post_tag и т д)
//		 * type_label - название данного типа с локализацией (Рубрика, Страница)
//		 * post_parent - ID родительского поста / категории
//		 * post_title - заголовок, который был у поста, когда он был добавлен в меню
//		 * post_name - ярлык, который был у поста при его добавлении в меню
//		 */
//		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
//
//		/*
//		 * Генерируем строку с CSS-классами элемента меню
//		 */
//		$class_names = $value = '';
//		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
//		$classes[] = 'menu-item-' . $item->ID;
//
//		// функция join превращает массив в строку
//		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
//		$class_names = ' class="' . esc_attr( $class_names ) . '"';
//
//		/*
//		 * Генерируем ID элемента
//		 */
//		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
//		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
//
//		/*
//		 * Генерируем элемент меню
//		 */
//		$output .= $indent . '<li' . $id . $value . $class_names .'>';
//
//		// атрибуты элемента, title="", rel="", target="" и href=""
//		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
//		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
//		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
//		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
//
//		// ссылка и околоссылочный текст
//		$item_output = $args->before;
//		$item_output .= '<a'. $attributes .'>';
//		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
//		$item_output .= '</a>';
//		$item_output .= $args->after;
//
//		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
//	}
//}

class Mogul_Navwalker extends Walker_Nav_Menu {

	/**
	 * Starts the list before the elements are added.
	 *
	 * Adds classes to the unordered list sub-menus.
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int    $depth  Depth of menu item. Used for padding.
	 * @param array  $args   An array of arguments. @see wp_nav_menu()
	 */
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		// Depth-dependent classes.
		$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		$display_depth = ( $depth + 1); // because it counts the first submenu as 0
		$classes = array(
				'sub-menu',
				( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
				( $display_depth >=2 ? 'sub-sub-menu' : '' ),
				'menu-depth-' . $display_depth
		);
		$class_names = implode( ' ', $classes );

		// Build HTML for output.

		$output .= '<span class="nav-desc" id="nav-desc-show"><i class="fa fa-angle-down" aria-hidden="true"></i> </span>';
		$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
	}

	/**
	 * Start the element output.
	 *
	 * Adds main/sub-classes to the list items and links.
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item   Menu item data object.
	 * @param int    $depth  Depth of menu item. Used for padding.
	 * @param array  $args   An array of arguments. @see wp_nav_menu()
	 * @param int    $id     Current item ID.
	 */
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $wp_query;
		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

		// Depth-dependent classes.
		$depth_classes = array(
				( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
				( $depth >=2 ? 'sub-sub-menu-item' : '' ),
				( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
				'menu-item-depth-' . $depth
		);
		$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

		// Passed classes.
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

		// Build HTML.
		$output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

		// Link attributes.
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

		// Build HTML output and pass through the proper filter.
		$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
				$args->before,
				$attributes,
				$args->link_before,
				apply_filters( 'the_title', $item->title, $item->ID ),
				$args->link_after,
				$args->after
		);
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

/**
 * Pagination
 * Custom pagination with mogul .pagination class
 * source: http://www.ordinarycoder.com/paginate_links-class-ul-li-mogul/
 *
 * @param boolean $echo echo
 * @return string
 */
function Mogul_pagination( $echo = true ) {
	global $wp_query;
	$big   = 999999999; // need an unlikely integer
	$pages = paginate_links(
		array(
			'base'         => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format'       => '?paged=%#%',
			'current'      => max( 1, get_query_var( 'paged' ) ),
			'total'        => $wp_query->max_num_pages,
			'type'         => 'array',
			'prev_next'    => true,
			'prev_text'    => __( '&laquo; Prev' ),
			'next_text'    => __( 'Next &raquo;' ),
		)
	);
	if ( is_array( $pages ) ) {
		$paged      = ( get_query_var( 'paged' ) === 0 ) ? 1 : get_query_var( 'paged' );
		$pagination = '<ul class="pagination">';
		foreach ( $pages as $page ) {
			$pagination .= "<li>$page</li>";
		}
		$pagination .= '</ul>';
		if ( $echo ) {
			// phpcs:ignore
			echo $pagination;
		} else {
			return $pagination;
		}
	}
}
/**
 * 4 - Comments tree
 * Mogul Comments Tree
 */
if ( ! class_exists( 'Mogul_Comments' ) ) :
	/**
	 * Undocumented class
	 */
	class Mogul_Comments extends Walker_Comment {
		/**
		 * tree_type
		 *
		 * @var string $tree_type  tree_type
		 */
		public $tree_type = 'comment';

		/**
		 * db_fields
		 *
		 * @var array $db_fields  tree_type
		 */
		public $db_fields = array(
			'parent' => 'comment_parent',
			'id'     => 'comment_ID',
		);
		/** CONSTRUCTOR
		 * You'll have to use this if you plan to get to the top of the comments list, as
		 * start_lvl() only goes as high as 1 deep nested comments */
		public function __construct() { ?>
			<h3><?php comments_number( __( 'No Responses to', 'wp_dev' ), __( 'One Response to', 'wp_dev' ), __( '% Responses to', 'wp_dev' ) ); ?> &#8220;<?php the_title(); ?>&#8221;</h3>
			<ol class="comment-list">
			<?php
		}

		/**
		 * Starts the list before the CHILD elements are added.
		 *
		 * @param string  $output output
		 * @param integer $depth depth
		 * @param array   $args args
		 * @return void
		 */
		public function start_lvl( &$output, $depth = 0, $args = array() ) {
			$GLOBALS['comment_depth'] = $depth + 1;
			?>
		<ul class="children">
			<?php
		}

		/**
		 * Ends the children list of after the elements are added.
		 *
		 * @param string  $output output
		 * @param integer $depth depth
		 * @param array   $args args
		 * @return void
		 */
		public function end_lvl( &$output, $depth = 0, $args = array() ) {
			$GLOBALS['comment_depth'] = $depth + 1;
			?>
		</ul><!-- /.children -->
			<?php
		}

		/**
		 * START_EL
		 *
		 * @param string  $output output
		 * @param mixed   $comment comment
		 * @param integer $depth depth
		 * @param array   $args args
		 * @param integer $id id
		 * @return void
		 */
		public function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
			$depth++;
			$GLOBALS['comment_depth'] = $depth;
			$GLOBALS['comment']       = $comment;
			$parent_class             = ( empty( $args['has_children'] ) ? '' : 'parent' );
			?>
		<li <?php comment_class( $parent_class ); ?> id="comment-<?php comment_ID(); ?>">
		<article id="comment-body-<?php comment_ID(); ?>" class="comment-body">
			<header class="comment-author">
					<?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
				<div class="author-meta vcard author">
						<?php printf( '<cite class="fn">%s</cite>', get_comment_author_link() ); ?>
					<time datetime="<?php echo comment_date( 'c' ); ?>">
						<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
							<?php printf( '%1$s', get_comment_date(), get_comment_time() ); ?>
						</a>
					</time>
				</div><!-- /.comment-author -->
			</header>
			<section id="comment-content-<?php comment_ID(); ?>" class="comment">
					<?php if ( ! $comment->comment_approved ) : ?>
					<div class="notice">
						<p class="bottom"><?php _e( 'Your comment is awaiting moderation.', 'wp_dev' ); ?></p>
					</div>
				<?php else : comment_text(); ?>
				<?php endif; ?>
			</section><!-- /.comment-content -->
			<div class="comment-meta comment-meta-data hide">
				<a href="<?php echo htmlspecialchars( get_comment_link( get_comment_ID() ) ); ?>"><?php comment_date(); ?> at <?php comment_time(); ?></a> <?php edit_comment_link( '(Edit)' ); ?>
			</div><!-- /.comment-meta -->
			<div class="reply">
					<?php
					$reply_args = array(
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
					);
					comment_reply_link( array_merge( $args, $reply_args ) );
					?>
			</div><!-- /.reply -->
		</article><!-- /.comment-body -->
			<?php
		}

		/**
		 * end_el
		 *
		 * @param string  $output output
		 * @param mixed   $comment comment
		 * @param integer $depth depth
		 * @param array   $args args
		 * @return void
		 */
		public function end_el( & $output, $comment, $depth = 0, $args = array() ) {
			?>
		</li><!-- /#comment-' . get_comment_ID() . ' -->
			<?php
		}
		/** DESTRUCTOR */
		public function __destruct() {
			?>
			</ol><!-- /#comment-list -->
		<?php }
	}
endif;
?>
