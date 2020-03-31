<?php

namespace maskeynihal\ladder\Services;

use maskeynihal\ladder\Hierarchy;

class HierarchyServices
{
    /*
        root is counted as level 1 
    */
    static $level = 1;
    static $tree = array();

    public static function countLevel(Hierarchy $hierarchy)
    {
        //level count; root is level 0
        if(!$hierarchy->description->is_root){
            self::$level++;
            self::countLevel($hierarchy->myParent());
        }

        return self::$level;
    }

    public static function tree(Hierarchy $hierarchy)
    {
        self::$tree[]= $hierarchy;

        if(!$hierarchy->description->is_root){
            self::tree($hierarchy->myParent());
        }

        return self::$tree;
    }
}

