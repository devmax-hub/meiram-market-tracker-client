<?php namespace Cms\Classes\Page;

/**
 * Fields
 *
 * @package october\cms
 * @author Alexey Bobkov, Samuel Georges
 */
class Fields
{
    /**
     * defineSettingsFields
     */
    public function defineSettingsFields(): array
    {
        return [
            'title' => [
                'title' => "cms::lang.editor.title",
                'placeholder' => "cms::lang.editor.new_title",
                'type' => 'string'
            ],
            'url' => [
                'title' => "cms::lang.editor.url",
                'placeholder' => "/",
                'type' => 'string',
                'preset' => [
                    'property' => "title",
                    'type' => 'url'
                ],
                'validation' => [
                    'required' => [
                        'message' => "cms::lang.page.url_required"
                    ],
                    'regex' => [
                        'message' => "cms::lang.page.invalid_url",
                        'pattern' => '^/[a-zA-Z0-9/\\:_\\-\\*\\[\\]\\+\\?\\|\\.\\^\\\\$]*$'
                    ]
                ]
            ],
            'fileName' => [
                'title' => "cms::lang.editor.filename",
                'type' => 'string',
                'preset' => [
                    'property' => "title",
                    'type' => 'file'
                ],
                'validation' => [
                    'required' => [
                        'message' => "cms::lang.cms_object.file_name_required"
                    ],
                    'regex' => [
                        'message' => "cms::lang.cms_object.invalid_file_inspector",
                        'pattern' => '^[a-z0-9\\_\\-\\.\\/]+$'
                    ]
                ]
            ],
            'layout' => [
                'type' => 'dropdown',
                'title' => "cms::lang.editor.layout"
            ],
            'is_hidden' => [
                'type' => 'checkbox',
                'title' => "cms::lang.editor.hidden",
                'description' => "cms::lang.editor.hidden_comment"
            ],
            'description' => [
                'title' => "cms::lang.editor.description",
                'description' => "cms::lang.page.description_hint",
                'type' => 'text',
                'size' => 'medium'
            ],
            'meta_title' => [
                'type' => 'string',
                'title' => "cms::lang.editor.meta_title",
                'tab' =>  "cms::lang.editor.meta"
            ],
            'meta_description' => [
                'title' => "cms::lang.editor.meta_description",
                'type' => 'text',
                'size' => 'medium',
                'tab' =>  "cms::lang.editor.meta"
            ]
        ];
    }
}
