<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use YajTech\Crud\Traits\CrudEventListener;
use YajTech\Crud\Traits\CrudModel;

class Blog extends Model
{
    use HasFactory, CrudModel, SoftDeletes, CrudEventListener;

    const COLUMNS = [
        [
            'name' => 'sn',
            'label' => 'SN',
            'align' => 'left',
            'type' => 'text',
            'sortable' => true,
        ],
        [
            'name' => 'title',
            'label' => 'Title',
            'align' => 'left',
            'type' => 'text',
            'sortable' => true,
        ],
        [
            'name' => 'description',
            'label' => 'Description',
            'align' => 'left',
            'type' => 'text',
            'sortable' => true,
        ],
        [
            'name' => 'image',
            'label' => 'Image',
            'align' => 'left',
            'type' => 'text',
            'sortable' => true,
        ],
        [
            'name' => 'user_id',
            'label' => 'User_id',
            'align' => 'left',
            'type' => 'text',
            'sortable' => true,
        ],
    ]
    ;
    const FIELDS = [
        [
            'name' => 'title',
            'label' => 'Title',
            'type' => 'text',
            'wrapper' => [
                'class' => 'col-6',
            ],
            'rules' => [
                'required' => true,
            ],
        ],
        [
            'name' => 'description',
            'label' => 'Description',
            'type' => 'text',
            'wrapper' => [
                'class' => 'col-6',
            ],
            'rules' => [
                'required' => true,
            ],
        ],
        [
            'name' => 'image',
            'label' => 'Image',
            'type' => 'text',
            'wrapper' => [
                'class' => 'col-6',
            ],
            'rules' => [
                'required' => true,
            ],
        ],
        [
            'name' => 'user_id',
            'label' => 'User_id',
            'type' => 'text',
            'wrapper' => [
                'class' => 'col-6',
            ],
            'rules' => [
                'required' => true,
            ],
        ],
    ]
    ;
    const TABLE = [
        'add_button' => true,
        'refresh_button' => true,
        'export_button' => true,
        'filter_button' => true,
    ];
    const FILTERS = [
        [
            'name' => 'title',
            'columns' => 'title',
            'type' => 'text',
            'relation' => 'where',
            'dense' => true,
            'label' => 'Title',
            'wrapper' => [
                'class' => 'col-3',
            ],
        ],
        [
            'name' => 'description',
            'columns' => 'description',
            'type' => 'text',
            'relation' => 'where',
            'dense' => true,
            'label' => 'Description',
            'wrapper' => [
                'class' => 'col-3',
            ],
        ],
        [
            'name' => 'image',
            'columns' => 'image',
            'type' => 'text',
            'relation' => 'where',
            'dense' => true,
            'label' => 'Image',
            'wrapper' => [
                'class' => 'col-3',
            ],
        ],
        [
            'name' => 'user_id',
            'columns' => 'user_id',
            'type' => 'text',
            'relation' => 'where',
            'dense' => true,
            'label' => 'User_id',
            'wrapper' => [
                'class' => 'col-3',
            ],
        ],
    ]
    ;

    protected $fillable = ['title', 'description', 'image', 'user_id', 'created_by', 'updated_by', 'extra'];

    protected $casts = [
        'extra' => 'array',
    ];
}
