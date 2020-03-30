<?php

namespace maskeynihal\ladder;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HierarchyDescription extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'hierarchy_id',
        'is_root',
        'parent_id'
    ];
}
