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
    *   @return Hierarchy returns parent of the given hierarchy model
    */
    public function myParent()
    {
        return Hierarchy::with('description')->where('hierarchy_id', $this->description->parent_id)->first();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // public function resolveRouteBinding($value)
    // {
    //     return $this->where('hierarchy_id', $value)->firstOrFail();
    // }

}