<?php

namespace App\Http\Controllers;

use App\ItemCondition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ItemConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $msg_success = Session::get('msg_success');
        $itemConditions = ItemCondition::all();

        return view('warehouse.item.condition.index')->with(
            [
                'itemConditions' => $itemConditions,
                'msg_success' => $msg_success
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('warehouse.item.condition.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'zustand' => 'required | min:2'
            ]
        );

        $condition = new ItemCondition(
            [
                'zustand' => $request->zustand
            ]
        );
        $condition->save();

        return redirect('/itemCondition')->with(
            'msg_success', 'Speichern vom Zustand <b>' . $request->zustand . '</b> erfolgreich.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ItemCondition  $itemCondition
     * @return \Illuminate\Http\Response
     */
    public function show(ItemCondition $itemCondition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ItemCondition  $itemCondition
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemCondition $itemCondition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ItemCondition  $itemCondition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemCondition $itemCondition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ItemCondition  $itemCondition
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemCondition $itemCondition)
    {
        //
    }
}
