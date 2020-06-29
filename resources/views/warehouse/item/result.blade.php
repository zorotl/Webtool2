@extends('layouts.app')

@section('sitetitle', 'Artikel-Übersicht')

@section('content')
    <div class="container-fluid">

        <div class="my-3 clearfix">
            <h1 class="h2 text-primary  d-inline">Lager: Alle Artikel anzeigen</h1>

            <div class="float-right">
                <button id="itemSearch" class="btn btn-outline-primary"><i class="fas fa-search mr-2"></i> Artikel suchen</button>
                <a class="btn btn-outline-primary ml-2" href="/item/create">
                    <i class="fas fa-plus-circle mr-2"></i> Neuen Artikel hinzufügen
                </a>
            </div>
        </div>

        <div>
            @include('warehouse.item.search')
        </div>

        <div class="row justify-content-center">
            <div class="col-12">
                <table class="table table-sm table-striped">
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
                        <th style="width: 170px;" scope="col">Bearbeitung</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $i)
                        <tr>
                            <td>{{ $i->storagePlace->storageLocation->warehouse->lager }}</td>
                            <td>{{ $i->storagePlace->storageLocation->lagerort }}
                                <br> {{ $i->storagePlace->lagerplatz }}</td>
                            <td>{{ $i->brand->marke }}</td>
                            <td>{{ $i->name }} <br> {{ $i->name2 }}</td>
                            <td>{{ $i->anzahl }}</td>
                            <td>{{ $i->itemType->art }} <br> {{$i->itemCondition->zustand }} </td>
                            <td>{{ $i->beschreibung }}</td>
                            <td>{{ $i->artikel_nummer }} <br> {{ $i->ean }}</td>
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
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
