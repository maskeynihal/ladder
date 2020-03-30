<?php


namespace maskeynihal\ladder\Seeds;


use Illuminate\Database\Seeder;
use maskeynihal\ladder\Hierarchy;
use maskeynihal\ladder\HierarchyDescription;


class HierarchySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hierarchies = [
            [
                [
                    'hierarchy_id' => 1,
                    'title' => 'HQ',
                    'slug' => 'hq'
                ],
                [
                    'hierarchy_id' => 1,
                    'is_root' => true,
                    'parent_id' => null
                ]
            ],
            [
                [
                    'hierarchy_id' => 2,
                    'title' => 'Province',
                    'slug' => 'province'
                ],
                [
                    'hierarchy_id' => 2,
                    'is_root' => false,
                    'parent_id' => 1
                ]
            ],
            [
                [
                    'hierarchy_id' => 3,
                    'title' => 'International',
                    'slug' => 'international'
                ],
                [
                    'hierarchy_id' => 3,
                    'is_root' => false,
                    'parent_id' => 1
                ]
            ],
            [
                [
                    'hierarchy_id' => 4,
                    'title' => 'District',
                    'slug' => 'district'
                ],
                [
                    'hierarchy_id' => 4,
                    'is_root' => false,
                    'parent_id' => 2
                ]
            ]
        ];

        foreach ($hierarchies as $hierarchy) {
            Hierarchy::insert($hierarchy[0]);
            HierarchyDescription::insert($hierarchy[1]);
        }
    }
}
