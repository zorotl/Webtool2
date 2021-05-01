<?php

namespace App\Http\Controllers;

use App\Warehouse;
use App\StorageLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WarehouseController extends Controller
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
        $warehouses = Warehouse::orderBy('lager')->get();

        return view('warehouse.index')->with(
            [
                'warehouses' => $warehouses,
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
        return view('warehouse.create');
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
                'lager' => 'required | min:3'
            ]
        );

        $warehouse = new Warehouse(
            [
                'lager' => $request->lager
            ]
        );
        $warehouse->save();

        return redirect('/warehouse')->with(
            'msg_success', 'Speichern von Lager <b>' . $request->lager . '</b> erfolgreich.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Warehouse $warehouse)
    {
        $msg_success = Session::get('msg_success');

        $storageLocations = StorageLocation::where('warehouse_id', $warehouse->id)->get();

        return view('warehouse.show')->with(
            [
                'warehouse' => $warehouse,
                'storageLocations' => $storageLocations,
                'msg_success' => $msg_success
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Warehouse $warehouse)
    {
        return view('warehouse.edit')->with('warehouse', $warehouse);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Warehouse $warehouse)
    {
        $request->validate(
            [
                'lager' => 'required | min:3'
            ]
        );

        $warehouse->update(
            [
                'lager' => $request->lager
            ]
        );
        $warehouse->save();

        return redirect('/warehouse')->with(
            'msg_success', 'Änderung von Lager <b>' . $request->lager . '</b> erfolgreich gespeichert.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Warehouse $warehouse)
    {
        $oldName = $warehouse->lager;
        $warehouse->delete();

        return back()->with([
            'msg_success' => 'Das Lager <b>' .$oldName. '</b> wurde gelöscht.'
        ]);
    }
}
