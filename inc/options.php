<?php
namespace DTSettings;

global $cpt_settings;

$cpt_settings['cpt_global'] = array(
	array( 'id' => 'post_type_name',
		'type' => 'text',
		'label' => 'Post type general name',
		'desc' => 'The handle (slug) name of the post type, usually plural.',
		'placeholder' => 'e.g. news'
		),
	array( 'id' => 'singular_name',
		'type' => 'text',
		'label' => 'Singular name',
		'desc' => 'name for one object of this post type.',
		'placeholder' => 'e.g. article'
		),
	array( 'id' => 'menu_name',
		'type' => 'text',
		'label' => 'Menu name',
		'desc' => 'display left menu label. same as name (if empty)'
		),
	);

$plural = $single = '';
$cpt_settings['labels'] = array(
	array('id' => array('labels' => 'add_new'),
		'type' => 'text',
		'placeholder' => 'Добавить ' . $single,
		'label' => 'Add new',
		'desc' => 'The add new text. The default is "Add New" for both hierarchical and non-hierarchical post types. When internationalizing this string, please use a gettext context matching your post type.'),

	array('id' => array('labels' => 'add_new_item'),
		'type' => 'text',
		'placeholder' => 'Добавить ' . $single,
		'label' => 'Add new item',
		'desc' => 'Default is Add New Post/Add New Page'),

	array('id' => array('labels' => 'new_item'),
		'type' => 'text',
		'placeholder' => 'Новая ' . $single,
		'label' => 'New item',
		'desc' => 'Default is New Post/New Page.'),

	array('id' => array('labels' => 'edit_item'),
		'type' => 'text',
		'placeholder' => 'Изменить ' . $single,
		'label' => 'Edit item',
		'desc' => 'Default is Edit Post/Edit Page'),

	array('id' => array('labels' => 'view_item'),
		'type' => 'text',
		'placeholder' => 'Показать ' . $single,
		'label' => 'View item',
		'desc' => 'Default is View Post/View Page.'),

	array('id' => array('labels' => 'all_items'),
		'type' => 'text',
		'placeholder' => 'Все ' . $plural,
		'label' => 'All items',
		'desc' => 'String for the submenu. Default is All Posts/All Pages.'),

	array('id' => array('labels' => 'search_items'),
		'type' => 'text',
		'placeholder' => 'Найти ' . $single,
		'label' => 'Search items',
		'desc' => 'Default is Search Posts/Search Pages.'),

	array('id' => array('labels' => 'not_found'),
		'type' => 'text',
		'placeholder' => $plural . ' не найдены',
		'label' => 'Not found',
		'desc' => 'Default is No posts found/No pages found.'),

	array('id' => array('labels' => 'not_found_in_trash'),
		'type' => 'text',
		'placeholder' => $plural . ' в корзине не найдены',
		'label' => 'Not found in Trash',
		'desc' => 'Default is No posts found in Trash/No pages found in Trash.'),
	);

$cpt_settings['cpt_main'] = array(
	array('id' => 'public',
		'type' => 'checkbox',
		'label' => 'Public',
		'desc' => 'Публичный или используется только технически',
		),
	array('id' => 'publicly_queryable',
		'type' => 'checkbox',
		'label' => 'Publicly queryable',
		'desc' => 'Показывать во front\'е',
		),
	array('id' => 'show_ui',
		'type' => 'checkbox',
		'label' => 'Show UI',
		'desc' => 'Показывать управление типом записи',
		),
	array('id' => 'show_in_menu',
		'type' => 'checkbox',
		'label' => 'Show in Menu',
		'desc' => 'Показывать ли в админ-меню',
		),
	array('id' => 'rewrite',
		'type' => 'checkbox',
		'label' => 'ReWrite',
		'desc' => 'ЧПУ',
		),
	array('id' => 'has_archive',
		'type' => 'checkbox',
		'label' => 'Has archive',
		'desc' => 'Поддержка архивной страницы',
		),
	array('id' => 'hierarchical',
		'type' => 'checkbox',
		'label' => 'Hierarchical',
		'desc' => 'Родители / тексономии',
		),
	array('id' => 'menu_position',
		'type' => 'checkbox',
		'label' => 'Menu position',
		'desc' => '',
		),
	);

$cpt_settings['cpt_main_textfields'] = array(
	array('id' => 'query_var',
		'type' => 'text',
		'label' => 'Query var',
		'desc' => '$post_type в query_var',
		),
	array('id' => 'capability_type',
		'type' => 'text',
		'label' => 'Capability type',
		'desc' => 'Права такие же как..',
		),
	array('id' => 'menu_icon',
		'type' => 'text',
		'label' => 'Menu icon',
		'placeholder' => 'dashicons-admin-post',
		)
	);

$cpt_settings['supports'] = array(
		array("id" => 's_title',
			'type' => 'checkbox',
			'label' => 'Post Title',
			'desc' => '',
			'default' => 'on'
			),
		array("id" => 's_editor',
			'type' => 'checkbox',
			'label' => 'Content Editor',
			'desc' => '',
			'default' => 'on'
			),
		array("id" => 's_thumbnail',
			'type' => 'checkbox',
			'label' => 'Post Thumbnail',
			'desc' => '',
			'default' => 'on'
			),
		array("id" => 's_excerpt',
			'type' => 'checkbox',
			'label' => 'Post Excerpt',
			'desc' => '',
			'default' => 'on'
			),
		array("id" => 's_custom-fields',
			'type' => 'checkbox',
			'label' => 'Custom Fields',
			'desc' => '',
			'default' => 'on'
			),
		array("id" => 's_page-attributes',
			'type' => 'checkbox',
			'label' => 'Page Attributes',
			'desc' => '',
			'default' => 'on'
			),
		);

add_filter( 'cpt_new_defaults', 'DTSettings\defaults', 10, 1 );
function defaults( $form ){
	$defaults = array(
		'public' => true,
		);

	foreach ( $form as &$inputs ) {
		foreach ($inputs as &$input) {
			
			if( !is_array($input['id']) && isset($defaults[ $input['id'] ]) ){
				if ( $input['type'] == 'checkbox' || $input['type'] == 'radio' ){
					if( $defaults[ $input['id'] ] )
						$input['checked'] = 'checked';
				}
				else {
					if( $defaults[ $input['id'] ] )
						$input['value'] = $defaults[ $input['id'] ];
				}
			}
		}
	}

	return $form;
}

if( isset($_GET['page']) && $_GET['page'] == DT_CCPT_PAGESLUG )
		$cpt_settings = apply_filters( 'cpt_new_defaults', $cpt_settings );