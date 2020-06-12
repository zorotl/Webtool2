<?php

namespace App\Http\Controllers;

use App\StoragePlace;
use App\StorageLocation;
use App\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StoragePlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $msg_success = Session::get('msg_success');
        $storagePlaces = StoragePlace::orderBy('storage_location_id')->orderBy('lagerplatz')->get();

        return view('warehouse.storage.place.index')->with(
            [
                'storagePlaces' => $storagePlaces,
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

        return view('warehouse.storage.place.create')->with(
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
                'lagerplatz' => 'required | min:3'
            ]
        );

        $storagePlace = new StoragePlace(
            [
                'warehouse_id' => $request->lager,
                'lagerplatz' => $request->lagerplatz
            ]
        );
        $storagePlace->save();

        return redirect('/storage_place')->with(
            'msg_success', 'Speichern von Lagerort <b>' . $request->lagerplatz . '</b> erfolgreich.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StoragePlace  $storagePlace
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(StoragePlace $storagePlace)
    {
//        $msg_success = Session::get('msg_success');
//
//        $storagePlaces = null;
//
//        return view('warehouse.storage.place.show')->with(
//            [
//                'storageLocation' => $storagePlace,
//                'msg_success' => $msg_success
//            ]
//        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StoragePlace  $storagePlace
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(StoragePlace $storagePlace)
    {
        $warehouses = Warehouse::orderBy('lager')->get();

        return view('warehouse.storage.place.edit')->with(
            [
                'warehouses' => $warehouses,
                'storageLocation' => $storagePlace
            ]
        );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StoragePlace  $storagePlace
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, StoragePlace $storagePlace)
    {
        $request->validate(
            [
                'lager' => 'required',
                'lagerplatz' => 'required | min:3'
            ]
        );

        $storagePlace->update(
            [
                'warehouse_id' => $request->lager,
                'lagerplatz' => $request->lagerplatz
            ]
        );
        $storagePlace->save();

        return redirect('/storage_place')->with(
            'msg_success', 'Änderung von Lagerort <b>' . $request->lagerplatz . '</b> erfolgreich gespeichert.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StoragePlace  $storagePlace
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(StoragePlace $storagePlace)
    {
        $oldName = $storagePlace->lagerplatz;
        $storagePlace->delete();

        return back()->with([
            'msg_success' => 'Das Lagerort <b>' .$oldName. '</b> wurde gelöscht.'
        ]);
    }
}
