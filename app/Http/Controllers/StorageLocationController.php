<?php

namespace App\Http\Controllers;

use App\StorageLocation;
use App\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StorageLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $msg_success = Session::get('msg_success');
        $storageLocations = StorageLocation::orderBy('warehouse_id')->orderBy('lagerort')->get();

        return view('warehouse.storage.location.index')->with(
            [
                'storageLocations' => $storageLocations,
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
        $warehouses = Warehouse::orderBy('lager')->get();

        return view('warehouse.storage.location.create')->with(
            [
                'warehouses' => $warehouses
            ]
        );
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
                'lager' => 'required',
                'lagerort' => 'required | min:3'
            ]
        );

        $storageLocation = new StorageLocation(
            [
                'warehouse_id' => $request->lager,
                'lagerort' => $request->lagerort
            ]
        );
        $storageLocation->save();

        return redirect('/storage_location')->with(
            'msg_success', 'Speichern von Lagerort <b>' . $request->lagerort . '</b> erfolgreich.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StorageLocation  $storageLocation
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(StorageLocation $storageLocation)
    {
//        $msg_success = Session::get('msg_success');
//
//        $storageLocations = null;
//
//        return view('warehouse.storage.location.show')->with(
//            [
//                'storageLocation' => $storageLocation,
//                'msg_success' => $msg_success
//            ]
//        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StorageLocation  $storageLocation
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(StorageLocation $storageLocation)
    {
        $warehouses = Warehouse::orderBy('lager')->get();

        return view('warehouse.storage.location.edit')->with(
            [
                'warehouses' => $warehouses,
                'storageLocation' => $storageLocation
            ]
        );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StorageLocation  $storageLocation
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, StorageLocation $storageLocation)
    {
        $request->validate(
            [
                'lager' => 'required',
                'lagerort' => 'required | min:3'
            ]
        );

        $storageLocation->update(
            [
                'warehouse_id' => $request->lager,
                'lagerort' => $request->lagerort
            ]
        );
        $storageLocation->save();

        return redirect('/storage_location')->with(
            'msg_success', 'Änderung von Lagerort <b>' . $request->lagerort . '</b> erfolgreich gespeichert.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StorageLocation  $storageLocation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(StorageLocation $storageLocation)
    {
        $oldName = $storageLocation->lagerort;
        $storageLocation->delete();

        return back()->with([
            'msg_success' => 'Das Lagerort <b>' .$oldName. '</b> wurde gelöscht.'
        ]);
    }
}
