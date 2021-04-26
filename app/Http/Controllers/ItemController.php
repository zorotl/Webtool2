<?php

namespace App\Http\Controllers;

use App\Item;
use App\Warehouse;
use App\StorageLocation;
use App\StoragePlace;
use App\Brand;
use App\ItemCondition;
use App\ItemType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Void_;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $msg_success = Session::get('msg_success');
        $items = Item::all();
        $warehouses = Warehouse::all();
        $oldWarehouse = "0";

        return view('warehouse.item.index')->with(
            [
                'items' => $items,
                'warehouses' => $warehouses,
                'oldWarehouse' => $oldWarehouse,
                'msg_success' => $msg_success
            ]
        );
    }

    /**
     * Show the form for searching a resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        if ($request->lager === "0") {
            return $this->index();
        } else {
            $msg_success = Session::get('msg_success');
            $items = Item::where('warehouse_id', $request->lager)->get();
            $warehouses = Warehouse::all();
            $oldWarehouse = $request->lager;

            return view('warehouse.item.result')->with(
                [
                    'items' => $items,
                    'warehouses' => $warehouses,
                    'oldWarehouse' => $oldWarehouse,
                    'msg_success' => $msg_success
                ]
            );
        }
    }

    /**
     * Display a listing of the resource, filtered by searching-result.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function result()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $warehouses = Warehouse::all();
        $storageLocations = StorageLocation::all();
        $storagePlaces = StoragePlace::all();
        $brands = Brand::all();
        $itemTypes = ItemType::all();
        $itemConditions = ItemCondition::all();

        return view('warehouse.item.create')->with(
            [
                'warehouses' => $warehouses,
                'storageLocations' => $storageLocations,
                'storagePlaces' => $storagePlaces,
                'brands' => $brands,
                'itemTypes' => $itemTypes,
                'itemConditions' => $itemConditions,
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
                'lagerort' => 'required',
                'lagerplatz' => 'required',
                'marke' => 'required',
                'name' => 'required | min:3',
                'anzahl' => 'required | numeric',
                'art' => 'required',
                'zustand' => 'required',
            ]
        );

        $item = new Item(
            [
                'warehouse_id' => $request->lager,
                'storage_location_id' => $request->lagerort,
                'storage_place_id' => $request->lagerplatz,
                'brand_id' => $request->marke,
                'item_condition_id' => $request->zustand,
                'item_type_id' => $request->art,
                'anzahl' => $request->anzahl,
                'name' => $request->name,
                'name2' => $request->name2,
                'beschreibung' => $request->beschreibung,
                'artikel_nummer' => $request->artikelnummer,
                'ean' => $request->ean,
            ]
        );
        $item->save();

        return redirect('/item')->with(
            'msg_success', 'Speichern von Ersatzteil <b>' . $request->name . '</b> erfolgreich.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Item $item)
    {
        $warehouses = Warehouse::all();
        $storageLocations = StorageLocation::all();
        $storagePlaces = StoragePlace::all();
        $brands = Brand::all();
        $itemTypes = ItemType::all();
        $itemConditions = ItemCondition::all();

        return view('warehouse.item.edit')->with(
            [
                'item'=> $item,
                'warehouses' => $warehouses,
                'storageLocations' => $storageLocations,
                'storagePlaces' => $storagePlaces,
                'brands' => $brands,
                'itemTypes' => $itemTypes,
                'itemConditions' => $itemConditions,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request, Item $item)
    {
        $request->validate(
            [
                'lager' => 'required',
                'lagerort' => 'required',
                'lagerplatz' => 'required',
                'marke' => 'required',
                'name' => 'required | min:3',
                'anzahl' => 'required | numeric',
                'art' => 'required',
                'zustand' => 'required',
            ]
        );

        $item->update(
            [
                'warehouse_id' => $request->lager,
                'storage_location_id' => $request->lagerort,
                'storage_place_id' => $request->lagerplatz,
                'brand_id' => $request->marke,
                'item_condition_id' => $request->zustand,
                'item_type_id' => $request->art,
                'anzahl' => $request->anzahl,
                'name' => $request->name,
                'name2' => $request->name2,
                'beschreibung' => $request->beschreibung,
                'artikel_nummer' => $request->artikelnummer,
                'ean' => $request->ean,
            ]
        );
        $item->save();

        return redirect('/item')->with(
            'msg_success', 'Änderung von Ersatzteil <b>' . $request->name . '</b> erfolgreich gespeichert.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Item $item)
    {
        $oldName = $item->name;
        $item->delete();

        return back()->with([
            'msg_success' => 'Der Artikel <b>' .$oldName. '</b> wurde gelöscht.'
        ]);
    }

    public function getStorageLocations() {
        $storageLocations = StorageLocation::where('warehouse_id', $_POST['lager'])->get();

        echo '<option value="0">Bitte wählen</option>';
        $storageLocations->each(function ($item) {
            echo '<option value="'.$item->id.'">'.$item->lagerort.'</option>';
        });
    }

    public function getStoragePlace() {
        $storagePlace = StoragePlace::where('storage_location_id', $_POST['lagerort'])->get();

        echo '<option value="0">Bitte wählen</option>';
        $storagePlace->each(function ($item) {
            echo '<option value="'.$item->id.'">'.$item->lagerplatz.'</option>';
        });
    }

    public function plus(Item $item) {
        $anzahlNeu = $item->anzahl + 1;

        $item->update(
            [
                'anzahl' => $anzahlNeu
            ]
        );
        $item->save();

        return redirect('/item')->with(
            'msg_success', 'Anzahl von Ersatzteil <b>' . $item->name . '</b> um 1 erhöht.'
        );
    }

    public function minus(Item $item) {
        $anzahlNeu = $item->anzahl - 1;

        if ($anzahlNeu < 0) {
            return redirect('/item')->with(
                'msg_success', 'Reduktion der Anzahl von Artikel <b>' . $item->name . '</b> nicht möglich.
                 Es sind keine Minus-Bestände erlaubt.'
            );
        } else {
            $item->update(
                [
                    'anzahl' => $anzahlNeu
                ]
            );
            $item->save();

            return redirect('/item')->with(
                'msg_success', 'Anzahl von Ersatzteil <b>' . $item->name . '</b> um 1 reduziert.'
            );
        }
    }
}
