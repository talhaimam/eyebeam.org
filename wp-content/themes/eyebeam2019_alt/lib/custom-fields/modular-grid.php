<?php

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_modular-grid',
		'title' => 'Modular grid',
		'fields' => array (
			array (
				'key' => 'field_5a8dbc2bc2b76',
				'label' => 'Modular grid items',
				'name' => 'items',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_5a8dbca1c2b78',
						'label' => 'Item type',
						'name' => 'type',
						'type' => 'select',
						'column_width' => '',
						'choices' => array (
							'hero' => 'Hero',
							'carousel' => 'Carousel',
							'module' => 'Module',
						),
						'default_value' => 'module',
						'allow_null' => 0,
						'multiple' => 0,
					),
					array (
						'key' => 'field_5a99c12e21c32',
						'label' => 'Hero type',
						'name' => 'hero_type',
						'type' => 'radio',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_5a8dbca1c2b78',
									'operator' => '==',
									'value' => 'hero',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => '',
						'choices' => array (
							'image' => 'Image hero',
							'text' => 'Text hero',
						),
						'other_choice' => 0,
						'save_other_choice' => 0,
						'default_value' => '',
						'layout' => 'vertical',
					),
					array (
						'key' => 'field_5a99b7e5f5658',
						'label' => 'Hero image',
						'name' => 'hero_image_desktop',
						'type' => 'image',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_5a8dbca1c2b78',
									'operator' => '==',
									'value' => 'hero',
								),
								array (
									'field' => 'field_5a99c12e21c32',
									'operator' => '==',
									'value' => 'image',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => '',
						'save_format' => 'id',
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
					array (
						'key' => 'field_5a99b82ef5659',
						'label' => 'Hero mobile image',
						'name' => 'hero_image_mobile',
						'type' => 'image',
						'instructions' => 'overrides on mobile',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_5a8dbca1c2b78',
									'operator' => '==',
									'value' => 'hero',
								),
								array (
									'field' => 'field_5a99c12e21c32',
									'operator' => '==',
									'value' => 'image',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => '',
						'save_format' => 'id',
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
					array (
						'key' => 'field_5a9a03f414af7',
						'label' => 'Hero image URL',
						'name' => 'hero_image_url',
						'type' => 'text',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_5a8dbca1c2b78',
									'operator' => '==',
									'value' => 'hero',
								),
								array (
									'field' => 'field_5a99c12e21c32',
									'operator' => '==',
									'value' => 'image',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
					array (
						'key' => 'field_5a99c1e221c35',
						'label' => 'Hero text',
						'name' => 'hero_text',
						'type' => 'textarea',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_5a8dbca1c2b78',
									'operator' => '==',
									'value' => 'hero',
								),
								array (
									'field' => 'field_5a99c12e21c32',
									'operator' => '==',
									'value' => 'text',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'maxlength' => '',
						'rows' => '',
						'formatting' => 'br',
					),
					array (
						'key' => 'field_565aee13pi233',
						'label' => 'Carousel',
						'name' => 'carousel',
						'type' => 'repeater',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_5a8dbca1c2b78',
									'operator' => '==',
									'value' => 'carousel',
								),
							),
							'allorany' => 'all',
						),
						'sub_fields' => array (
							array (
								'key' => 'field_576cbc67rv233',
								'label' => 'Image',
								'name' => 'image',
								'type' => 'image',
								'column_width' => '',
								'save_format' => 'id',
								'preview_size' => 'thumbnail',
								'library' => 'all',
							),
							array (
								'key' => 'field_556aba43rg2',
								'label' => 'Caption',
								'name' => 'caption',
								'type' => 'wysiwyg',
								'column_width' => '',
								'default_value' => '',
								'toolbar' => 'basic',
								'media_upload' => 'no',
							),
						),
						'row_min' => '',
						'row_limit' => '',
						'layout' => 'row',
						'button_label' => 'Add Media',
					),
					array (
						'key' => 'field_5a99c21321c37',
						'label' => 'Module type',
						'name' => 'module_type',
						'type' => 'radio',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_5a8dbca1c2b78',
									'operator' => '==',
									'value' => 'module',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => '',
						'choices' => array (
							'full_width' => 'Full width',
							'section_header' => 'Section Header',
							'two_thirds' => '2/3 width',
							'one_half' => '1/2 width',
							'one_third' => '1/3 width',
							'collection' => 'Collection',
							'toc' => 'Table of contents',
							'donate' => 'Donate form',
							// 'related' => 'Related Reading',
						),
						'other_choice' => 0,
						'save_other_choice' => 0,
						'default_value' => '',
						'layout' => 'vertical',
					),
					array (
						'key' => 'field_5a9a13961c280',
						'label' => 'Module collection',
						'name' => 'module_collection',
						'type' => 'radio',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_5a8dbca1c2b78',
									'operator' => '==',
									'value' => 'module',
								),
								array (
									'field' => 'field_5a99c21321c37',
									'operator' => '==',
									'value' => 'collection',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => '',
						'choices' => array (
							'posts' => 'Blog Posts',
							'staff' => 'Staff',
							'support' => 'Support',
							'ideas' => 'Ideas',
							'residents' => 'Residents',
							'projects' 	=> 'Projects',
							'events' => 'Events',
							'partners' => 'Residency Partners',
						),
						'other_choice' => 0,
						'save_other_choice' => 0,
						'default_value' => '',
						'layout' => 'vertical',
					),
					array (
						'key' => 'field_5a8dbdb674ec37999',
						'label' => 'Number of Items',
						'name' => 'collection_post_limit',
						'type' => 'text',
						'instructions' => 'Limits the number of items returned',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array(
								array (
									'field' => 'field_5a8dbca1c2b78',
									'operator' => '==',
									'value' => 'module',
								),
								array (
									'field' => 'field_5a99c21321c37',
									'operator' => '==',
									'value' => 'collection',
								),
							),
						),
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
					),
					array (
						'key' => 'field_5a8dbca1c2b789999',
						'label' => 'Columns',
						'name' => 'collection_columns',
						'type' => 'select',
						'column_width' => '',
						'choices' => array (
							'two-columns' => '2',
							'three-columns' => '3',
							'four-columns' => '4',
							'five-columns' => '5',
							'six-columns' => '6',
						),
						'default_value' => 'three-columns',
						'allow_null' => 0,
						'multiple' => 0,
					),
					array (
						'key' => 'field_5a8dbca1c2b78933',
						'label' => 'Event Timing',
						'name' => 'event_timing',
						'type' => 'select',
						'column_width' => '',
						'choices' => array (
							'upcoming' => 'Upcoming',
							'past' => 'Past',
							'all' => 'All',
						),
							'conditional_logic' => array (
							'status' => 1,
							'rules' => array(
								array (
									'field' => 'field_5a8dbca1c2b78',
									'operator' => '==',
									'value' => 'module',
								),
								array (
									'field' => 'field_5a99c21321c37',
									'operator' => '==',
									'value' => 'collection',
								),
							),
						),
						'default_value' => 'All',
						'allow_null' => 0,
						'multiple' => 0,
					),
					array (
						'key' => 'field_5a8dbc52c2b77',
						'label' => 'Module page',
						'name' => 'module_page',
						'type' => 'relationship',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_5a8dbca1c2b78',
									'operator' => '==',
									'value' => 'module',
								),
								array (
									'field' => 'field_5a99c21321c37',
									'operator' => '!=',
									'value' => 'collection',
								),
								array (
									'field' => 'field_5a99c21321c37',
									'operator' => '!=',
									'value' => 'toc',
								),
								array (
									'field' => 'field_5a99c21321c37',
									'operator' => '!=',
									'value' => 'donate',
								),
								array (
									'field' => 'field_5a99c21321c37',
									'operator' => '!=',
									'value' => 'related',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => '',
						'return_format' => 'object',
						'post_type' => array (
							0 => 'post',
							1 => 'page',
							2 => 'resident',
							3 => 'event',
							4 => 'archive',
						),
						'taxonomy' => array (
							0 => 'all',
						),
						'filters' => array (
							0 => 'search',
						),
						'result_elements' => array (
							0 => 'post_type',
							1 => 'post_title',
						),
						'max' => 1,
					),
					array (
						'key' => 'field_5a8dbdb674ec3',
						'label' => 'Module title',
						'name' => 'module_title',
						'type' => 'text',
						'instructions' => 'overrides page title',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_5a8dbca1c2b78',
									'operator' => '==',
									'value' => 'module',
								),
								array (
									'field' => 'field_5a99c21321c37',
									'operator' => '!=',
									'value' => 'toc',
								),
								array (
									'field' => 'field_5a9a13961c280',
									'operator' => '!=',
									'value' => 'ideas',
								),
								array (
									'field' => 'field_5a9a13961c280',
									'operator' => '!=',
									'value' => 'support',
								),
								array (
									'field' => 'field_5a9a13961c280',
									'operator' => '!=',
									'value' => 'events',
								),
								array (
									'field' => 'field_5a99c21321c37',
									'operator' => '!=',
									'value' => 'donate',
								),
								array (
									'field' => 'field_5a99c21321c37',
									'operator' => '!=',
									'value' => 'related',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_5a8dbe674005e',
						'label' => 'Module URL',
						'name' => 'module_url',
						'type' => 'text',
						'instructions' => 'overrides page URL',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_5a8dbca1c2b78',
									'operator' => '==',
									'value' => 'module',
								),
								array (
									'field' => 'field_5a99c21321c37',
									'operator' => '!=',
									'value' => 'collection',
								),
								array (
									'field' => 'field_5a99c21321c37',
									'operator' => '!=',
									'value' => 'toc',
								),
								array (
									'field' => 'field_5a99c21321c37',
									'operator' => '!=',
									'value' => 'donate',
								),
								array (
									'field' => 'field_5a99c21321c37',
									'operator' => '!=',
									'value' => 'related',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
					array (
						'key' => 'field_5a8dbe814005f',
						'label' => 'Module description',
						'name' => 'module_description',
						'type' => 'wysiwyg',
						'instructions' => 'overrides page excerpt',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_5a8dbca1c2b78',
									'operator' => '==',
									'value' => 'module',
								),
								array (
									'field' => 'field_5a99c21321c37',
									'operator' => '!=',
									'value' => 'toc',
								),
								array (
									'field' => 'field_5a9a13961c280',
									'operator' => '!=',
									'value' => 'staff',
								),
								array (
									'field' => 'field_5a9a13961c280',
									'operator' => '!=',
									'value' => 'support',
								),
								array (
									'field' => 'field_5a9a13961c280',
									'operator' => '!=',
									'value' => 'ideas',
								),
								array (
									'field' => 'field_5a9a13961c280',
									'operator' => '!=',
									'value' => 'residents',
								),
								array (
									'field' => 'field_5a9a13961c280',
									'operator' => '!=',
									'value' => 'projects',
								),
								array (
									'field' => 'field_5a9a13961c280',
									'operator' => '!=',
									'value' => 'events',
								),
								array (
									'field' => 'field_5a99c21321c37',
									'operator' => '!=',
									'value' => 'donate',
								),
								array (
									'field' => 'field_5a99c21321c37',
									'operator' => '!=',
									'value' => 'related',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => '',
						'default_value' => '',
						'toolbar' => 'basic',
						'media_upload' => 'no',
					),
					array (
						'key' => 'field_5a8dbeeb40060',
						'label' => 'Module image',
						'name' => 'module_image',
						'type' => 'image',
						'instructions' => 'overrides page image',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_5a8dbca1c2b78',
									'operator' => '==',
									'value' => 'module',
								),
								array (
									'field' => 'field_5a99c21321c37',
									'operator' => '!=',
									'value' => 'two_thirds',
								),
								array (
									'field' => 'field_5a99c21321c37',
									'operator' => '!=',
									'value' => 'collection',
								),
								array (
									'field' => 'field_5a99c21321c37',
									'operator' => '!=',
									'value' => 'toc',
								),
								array (
									'field' => 'field_5a99c21321c37',
									'operator' => '!=',
									'value' => 'donate',
								),
								array (
									'field' => 'field_5a99c21321c37',
									'operator' => '!=',
									'value' => 'related',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => '',
						'save_format' => 'id',
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
					array (
						'key' => 'field_5a9a033124c15',
						'label' => 'Module layout',
						'name' => 'module_layout',
						'type' => 'radio',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_5a8dbca1c2b78',
									'operator' => '==',
									'value' => 'module',
								),
								array (
									'field' => 'field_5a99c21321c37',
									'operator' => '==',
									'value' => 'one_half',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => '',
						'choices' => array (
							'image_first' => 'Image first',
							'text_first' => 'Text first',
						),
						'other_choice' => 0,
						'save_other_choice' => 0,
						'default_value' => 'image_first',
						'layout' => 'vertical',
					),
					array (
						'key' => 'field_5a99b92df565d',
						'label' => 'Module video URL',
						'name' => 'module_video_url',
						'type' => 'text',
						'instructions' => 'only YouTube is supported currently',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_5a8dbca1c2b78',
									'operator' => '==',
									'value' => 'module',
								),
								array (
									'field' => 'field_5a99c21321c37',
									'operator' => '!=',
									'value' => 'two_thirds',
								),
								array (
									'field' => 'field_5a99c21321c37',
									'operator' => '!=',
									'value' => 'one_third',
								),
								array (
									'field' => 'field_5a99c21321c37',
									'operator' => '!=',
									'value' => 'collection',
								),
								array (
									'field' => 'field_5a99c21321c37',
									'operator' => '!=',
									'value' => 'toc',
								),
								array (
									'field' => 'field_5a99c21321c37',
									'operator' => '!=',
									'value' => 'donate',
								),
								array (
									'field' => 'field_5a99c21321c37',
									'operator' => '!=',
									'value' => 'related',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
					array (
						'key' => 'field_5a9ae2f413b5233',
						'label' => 'Button Text',
						'name' => 'button_text',
						'type' => 'text',
						'instructions' => 'Text to display as a button in module',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_5a8dbca1c2b78',
									'operator' => '==',
									'value' => 'module',
								),
								array (
									'field' => 'field_5a8dbca1c2b78',
									'operator' => '!=',
									'value' => 'collection',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_5a9ad8c251f7e',
						'label' => 'Residents date',
						'name' => 'residents_date',
						'type' => 'radio',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_5a9a13961c280',
									'operator' => '==',
									'value' => 'residents',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => '',
						'choices' => array (
							'show' => 'Show date selector',
							'hide' => 'Hide date selector',
						),
						'other_choice' => 0,
						'save_other_choice' => 0,
						'default_value' => '',
						'layout' => 'vertical',
					),
					array (
						'key' => 'field_5a9ae0f58c9d7889',
						'label' => 'Text Layout',
						'name' => 'text_layout',
						'type' => 'radio',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_5a99c21321c37',
									'operator' => '==',
									'value' => 'full_width',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => '',
						'choices' => array (
							'one_half' => '1/2 width',
							'full_width' => 'Full width',
						),
						'other_choice' => 0,
						'save_other_choice' => 0,
						'default_value' => 'two_thirds',
						'layout' => 'vertical',
					),
					array (
						'key' => 'field_5a9ae0f58c9d7',
						'label' => 'Video layout',
						'name' => 'video_layout',
						'type' => 'radio',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_5a99c21321c37',
									'operator' => '==',
									'value' => 'full_width',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => '',
						'choices' => array (
							'two_thirds' => '2/3 width',
							'full_width' => 'Full width',
						),
						'other_choice' => 0,
						'save_other_choice' => 0,
						'default_value' => 'two_thirds',
						'layout' => 'vertical',
					),
					array (
						'key' => 'field_5aa52a6fdfff7',
						'label' => 'TOC status',
						'name' => 'toc_status',
						'type' => 'radio',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_5a8dbca1c2b78',
									'operator' => '==',
									'value' => 'module',
								),
								array (
									'field' => 'field_5a99c21321c37',
									'operator' => '!=',
									'value' => 'toc',
								),
								array (
									'field' => 'field_5a99c21321c37',
									'operator' => '!=',
									'value' => 'related',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => '',
						'choices' => array (
							'show' => 'Include in TOC',
							'hide' => 'Hide from TOC',
						),
						'other_choice' => 0,
						'save_other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
					),
					array (
						'key' => 'field_5a9ae2f413b52',
						'label' => 'TOC title',
						'name' => 'toc_title',
						'type' => 'text',
						'instructions' => 'override title for Table of Contents',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_5a8dbca1c2b78',
									'operator' => '==',
									'value' => 'module',
								),
								array (
									'field' => 'field_5aa52a6fdfff7',
									'operator' => '!=',
									'value' => 'hide',
								),
								array (
									'field' => 'field_5a99c21321c37',
									'operator' => '!=',
									'value' => 'related',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add Item',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-modular.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
			),
		),
		'menu_order' => 0,
	));
}
