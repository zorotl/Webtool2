<?php

namespace App\Http\Controllers;

use App\ItemType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ItemTypeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $msg_success = Session::get('msg_success');
        $itemType = ItemType::orderBy('priorität')->orderBy('art')->get();

        return view('warehouse.item.type.index')->with(
            [
                'itemType' => $itemType,
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
        return view('warehouse.item.type.create');
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
                'art' => 'required | min:3',
                'priorität' => 'required | integer | min:0 | max:9'
            ]
        );

        $itemType = new ItemType(
            [
                'art' => $request->art,
                'priorität' => $request->priorität
            ]
        );
        $itemType->save();

        return redirect('/itemType')->with(
            'msg_success', 'Speichern von Art <b>' . $request->art . '</b> erfolgreich.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ItemType  $itemType
     * @return \Illuminate\Http\Response
     */
    public function show(ItemType $itemType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ItemType  $itemType
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(ItemType $itemType)
    {
        return view('warehouse.item.type.edit')->with('itemType', $itemType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ItemType  $itemType
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, ItemType $itemType)
    {
        $request->validate(
            [
                'art' => 'required | min:3',
                'priorität' => 'required | integer | min:0 | max:9'
            ]
        );

        $itemType->update(
            [
                'art' => $request->art,
                'priorität' => $request->priorität
            ]
        );
        $itemType->save();

        return redirect('/itemType')->with(
            'msg_success', 'Änderung von Art <b>' . $request->art . '</b> erfolgreich gespeichert.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ItemType  $itemType
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(ItemType $itemType)
    {
        $oldName = $itemType->art;
        $itemType->delete();

        return back()->with([
            'msg_success' => 'Die Art <b>' .$oldName. '</b> wurde gelöscht.'
        ]);
    }
}
