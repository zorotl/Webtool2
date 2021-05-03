@extends('layouts.app')

@section('sitetitle', 'Artikel-Übersicht')

@section('content')
    <div class="container-fluid">

        <div class="my-3 clearfix">
            @if(!isset($items[1]))
                <h1 class="h2 text-primary  d-inline">Keine Ersatzteile gefunden</h1>

            @elseif($oldWarehouse === "0" && $oldStorageLocation === "0" && $oldStoragePlace === "0")
                <h1 class="h2 text-primary  d-inline">Alle {{ $items->count() }} Artikel werden angezeigt</h1>

            @elseif($oldStorageLocation === "0" && $oldStoragePlace === "0")
                <h1 class="h2 text-primary  d-inline">
                    {{ $items->count() }} Artikel vom
                    <b>{{ $items[1]->storagePlace->storageLocation->warehouse->lager }}</b>
                    werden anzeigen
                </h1>

            @elseif($oldStoragePlace === "0")
                <h1 class="h2 text-primary  d-inline">
                    {{ $items->count() }} Artikel vom
                    <b>{{ $items[1]->storagePlace->storageLocation->lagerort }}</b>
                    werden anzeigen
                </h1>

            @else
                <h1 class="h2 text-primary  d-inline">
                    {{ $items->count() }} Artikel vom
                    <b>{{ $items[1]->storagePlace->lagerplatz }}</b>
                    werden anzeigen
                </h1>

            @endif

            <div class="float-right">
                <button class="btn btn-outline-primary" id="headingSearch" type="button" data-toggle="collapse"
                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-search mr-2"></i>Lagersuche ein-/ausblenden
                </button>
                @auth
                    <a class="btn btn-outline-primary ml-2" href="/item/create">
                        <i class="fas fa-plus-circle mr-2"></i> Neuen Artikel hinzufügen
                    </a>
                @endauth
            </div>
        </div>

        <div>
            @include('warehouse.item.search')
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-12">
                <table id="itemTable" class="table table-sm table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Lager</th>
                        <th scope="col">Lagerort / Lagerplatz</th>
                        <th scope="col">Marke</th>
                        <th scope="col">Name / Name 2</th>
                        <th scope="col">Anzahl</th>
                        <th scope="col">Art / Zustand</th>
                        <th scope="col">Beschreibung</th>
                        <th scope="col">Artikel-Nummer / EAN</th>
                        @auth<th style="width: 170px;" scope="col">Bearbeitung</th>@endauth
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $i)
                        <tr>
                            <td>{{ $i->storagePlace->storageLocation->warehouse->lager }}</td>
                            <td>{{ $i->storagePlace->lagerplatz }}</td>
{{--                            <td>{{ $i->storagePlace->storageLocation->lagerort }}--}}
{{--                                <br> {{ $i->storagePlace->lagerplatz }}</td>--}}
                            <td>{{ $i->brand->marke }}</td>
                            <td>{{ $i->name }} <br> {{ $i->name2 }}</td>
                            <td>{{ $i->anzahl }}</td>
                            <td>{{ $i->itemType->art }} <br> {{$i->itemCondition->zustand }} </td>
                            <td>{{ $i->beschreibung }}</td>
                            <td>{{ $i->artikel_nummer }} <br> {{ $i->ean }}</td>
                            @auth
                                <td class="align-middle">
                                    <a class="btn btn-sm btn-outline-primary"
                                       href="/item/{{ $i->id }}/edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-outline-primary ml-1"
                                       href="/item/{{ $i->id }}/plus">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    <a class="btn btn-sm btn-outline-primary ml-1"
                                       href="/item/{{ $i->id }}/minus">
                                        <i class="fas fa-minus"></i>
                                    </a>
                                    <form style="display: inline;" action="/item/{{ $i->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Wirklich löschen?')"
                                                class="btn btn-outline-danger btn-sm ml-1" type="submit">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            @endauth
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
