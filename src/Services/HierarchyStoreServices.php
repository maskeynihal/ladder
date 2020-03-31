<?php


namespace maskeynihal\ladder\Services;

use Illuminate\Support\Str;
use maskeynihal\ladder\Hierarchy;
use maskeynihal\ladder\HierarchyDescription;

class HierarchyStoreServices
{
    public static function store($request, $hierarchy=null)
    {
        try {
            $hierarchy = Hierarchy::updateOrCreate([
                'hierarchy_id' => $hierarchy->hierarchy_id ?? (string) Str::uuid(),
            ],[
                'title' => $request->title,
                'slug' => Str::slug($request->title, '-'),
            ]);

            $hierarchyDesription = HierarchyDescription::updateOrCreate([
                'hierarchy_id' => $hierarchy->hierarchy_id,
            ],[
                'parent_id' => $request->parent_id,
                'is_root' => $request->parent_id == null ? true : false
            ]);

            return array_merge($hierarchy->toArray(), $hierarchyDesription->toArray());

        } catch (\Throwable $th) {

            throw new \Exception($th->getMessage());
        }
    }

     
}
