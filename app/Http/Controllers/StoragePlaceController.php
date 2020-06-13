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
    public function create(Request $request)
    {
        $storageLocation = StorageLocation::where('id', $request->storage_location_id)->first();

        return view('warehouse.storage.place.create')->with(
            [
                'storageLocation' => $storageLocation
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
                'lagerort' => 'required',
                'lagerplatz' => 'required | min:3'
            ]
        );

        $storagePlace = new StoragePlace(
            [
                'storage_location_id' => $request->lagerort,
                'lagerplatz' => $request->lagerplatz
            ]
        );
        $storagePlace->save();

        return redirect('/storage_location/'.$request->lagerort)->with(
            'msg_success', 'Speichern von Lagerplatz <b>' . $request->lagerplatz . '</b> erfolgreich.'
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StoragePlace  $storagePlace
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(StoragePlace $storagePlace, Request $request)
    {
        $storageLocation = StorageLocation::where('id', $request->storage_location_id)->first();

        return view('warehouse.storage.place.edit')->with(
            [
                'storageLocation' => $storageLocation,
                'storagePlace' => $storagePlace
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
                'lagerort' => 'required',
                'lagerplatz' => 'required | min:3'
            ]
        );

        $storagePlace->update(
            [
                'storage_location_id' => $request->lagerort,
                'lagerplatz' => $request->lagerplatz
            ]
        );
        $storagePlace->save();

        return redirect('/storage_location/'.$request->lagerort)->with(
            'msg_success', 'Änderung von Lagerplatz <b>' . $request->lagerplatz . '</b> erfolgreich gespeichert.'
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
            'msg_success' => 'Der Lagerplatz <b>' .$oldName. '</b> wurde gelöscht.'
        ]);
    }
}
