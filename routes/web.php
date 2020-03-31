<?php

use maskeynihal\ladder\Facades\Ladder;

// Route::view('ladder', 'ladder::admin.create');

// Route::get('admin/ladder', 'LadderController@index');

Route::resource(Ladder::prefix(), 'HierarchyController');