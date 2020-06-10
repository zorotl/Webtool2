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

        $itemCondition = new ItemCondition(
            [
                'zustand' => $request->zustand
            ]
        );
        $itemCondition->save();

        return redirect('/itemCondition')->with(
            'msg_success', 'Speichern von Zustand <b>' . $request->zustand . '</b> erfolgreich.'
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(ItemCondition $itemCondition)
    {
        return view('warehouse.item.condition.edit')->with('itemCondition', $itemCondition);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ItemCondition  $itemCondition
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, ItemCondition $itemCondition)
    {
        $request->validate(
            [
                'zustand' => 'required | min:2'
            ]
        );

        $itemCondition->update(
            [
                'zustand' => $request->zustand
            ]
        );
        $itemCondition->save();

        return redirect('/itemCondition')->with(
            'msg_success', 'Änderung von Zustand <b>' . $request->zustand . '</b> erfolgreich gespeichert.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ItemCondition  $itemCondition
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(ItemCondition $itemCondition)
    {
        $oldName = $itemCondition->zustand;
        $itemCondition->delete();

        return back()->with([
            'msg_success' => 'Der Zustand <b>' .$oldName. '</b> wurde gelöscht.'
        ]);
    }
}
