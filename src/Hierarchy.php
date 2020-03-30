<?php

namespace maskeynihal\ladder;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hierarchy extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'hierarchy_id',
        'title',
        'slug',
        'status'
    ];

    public function description()
    {
        return $this->hasOne(HierarchyDescription::class, 'hierarchy_id', 'hierarchy_id');
    }

    /**
    *   @return Heirarchy returns parent of the given hierarchy model
    */
    public function myParent()
    {
        return Hierarchy::where('hierarchy_id', $this->description->parent_id)->first();
    }
}