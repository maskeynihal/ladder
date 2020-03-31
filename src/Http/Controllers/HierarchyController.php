<?php

namespace maskeynihal\ladder\Http\Controller;

use maskeynihal\ladder\Hierarchy;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use maskeynihal\ladder\Http\Requests\HierarchyRequest;
use maskeynihal\ladder\Http\Requests\HierarchyUpdateRequest;
use maskeynihal\ladder\Services\HierarchyServices;
use maskeynihal\ladder\Services\HierarchyStoreServices;

class HierarchyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hierarchies = Hierarchy::with('description')->get();
        
        return view('ladder::index', compact('hierarchies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hierarchies = Hierarchy::pluck('title', 'hierarchy_id')->prepend('No Parent', '');
        
        return view('ladder::create', compact('hierarchies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HierarchyRequest $request)
    {
        $store = HierarchyStoreServices::store($request);

        return redirect()->route('ladder.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Hierarchy $ladder)
    {
        $ladder->load('description');

        $tree = array_reverse(HierarchyServices::tree($ladder));

        return view('ladder::show', compact(['ladder', 'tree']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Hierarchy $ladder)
    {
        $hierarchies = Hierarchy::pluck('title', 'hierarchy_id')->prepend('No Parent', '');

        return view('ladder::edit', compact(['ladder', 'hierarchies']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HierarchyUpdateRequest $request, Hierarchy $ladder)
    {
        $store = HierarchyStoreServices::store($request, $ladder);

        return redirect()->route('ladder.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
