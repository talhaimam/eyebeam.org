<?php

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_events',
		'title' => 'Events',
		'fields' => array (
			array (
				'key' => 'field_56f5c2117ec33',
				'label' => 'Subtitle',
				'name' => 'subtitle',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5696ba1d1427e',
				'label' => 'Start Date',
				'name' => 'start_date',
				'type' => 'date_picker',
				'required' => 1,
				'date_format' => 'yymmdd',
				'display_format' => 'mm/dd/yy',
				'first_day' => 1,
			),
			array (
				'key' => 'field_56d083807a4f4',
				'label' => 'End Date',
				'name' => 'end_date',
				'type' => 'date_picker',
				'required' => 1,
				'date_format' => 'yymmdd',
				'display_format' => 'mm/dd/yy',
				'first_day' => 1,
			),
			array (
				'key' => 'field_56d083437a4f3',
				'label' => 'Location',
				'name' => 'location',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5aa1bb26a9b87',
				'label' => 'Meta',
				'name' => 'meta',
				'type' => 'wysiwyg',
				'instructions' => 'override meta content',
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'no',
			),
			array (
				'key' => 'field_568ac2197cee7',
				'label' => 'Event Info',
				'name' => 'event_info',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_568ac2277cee8',
				'label' => 'Image',
				'name' => 'image',
				'type' => 'image',
				'save_format' => 'id',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_5aa1b7e8b1f69',
				'label' => 'Show Related Readings Automatically',
				'name' => 'show_related',
				'type' => 'radio',
				'choices' => array (
					'auto' => 'Show Related Readings Automatically',
					'manual' => 'Manually Select Related Readings',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'manual',
				'layout' => 'horizontal',
			),						
			array (
				'key' => 'field_586bce21ov37',
				'label' => 'Related Readings',
				'name' => 'related_readings',
				'type' => 'relationship',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'post,project,resident,archive',
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
				'max' => '',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5aa1b7e8b1f69',
							'operator' => '==',
							'value' => 'manual',
						),
					),
					'allorany' => 'all',
				),
			),	
			array (
				'key' => 'field_5aa1b7e8b1f82349',
				'label' => 'Display Tags',
				'name' => 'show_tags',
				'type' => 'radio',
				'choices' => array (
					'show' => 'Show Tags',
					'hide' => 'Hide Tags',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'show',
				'layout' => 'horizontal',
			),		
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'event',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'discussion',
				1 => 'comments',
				2 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
}
