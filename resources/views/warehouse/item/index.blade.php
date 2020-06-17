@extends('layouts.app')

@section('sitetitle', 'Artikel-Übersicht')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="h2 text-primary my-3">Lager: Alle Artikel anzeigen</h1>

                <table class="table table-striped">
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
                        <th scope="col">Bearbeitung</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $i)
                        <tr>
                            <td>{{ $i->storagePlace->storageLocation->warehouse->lager }}</td>
                            <td>{{ $i->storagePlace->storageLocation->lagerort }} <br> {{ $i->storagePlace->lagerplatz }}</td>
                            <td>{{ $i->brand->marke }}</td>
                            <td>{{ $i->name }} <br> {{ $i->name2 }}</td>
                            <td>{{ $i->anzahl }}</td>
                            <td>{{ $i->itemType->art }} <br> {{$i->itemCondition->zustand }} </td>
                            <td>{{ $i->beschreibung }}</td>
                            <td>{{ $i->artikel_nummer }} <br> {{ $i->ean }}</td>
                            <td>
                                <a class="btn btn-sm btn-outline-primary mb-2"
                                   href="/item/{{ $i->id }}/edit">
                                    <i class="fas fa-plus"></i>
                                </a>
                                <a class="btn btn-sm btn-outline-primary mb-2 ml-2"
                                   href="/item/{{ $i->id }}/edit">
                                    <i class="fas fa-minus"></i>
                                </a>
                                <br>
                                <a class="btn btn-sm btn-outline-primary"
                                   href="/item/{{ $i->id }}/edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form style="display: inline;" action="/item/{{ $i->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Wirklich löschen?')" class="btn btn-outline-danger btn-sm ml-2" type="submit">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <a class="btn btn-primary mt-4" href="/item/create">
                    <i class="fas fa-plus-circle mr-2"></i> Neuen Artikel hinzufügen
                </a>
            </div>
        </div>
    </div>
@endsection
