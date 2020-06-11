@extends('layouts.app')

@section('sitetitle', 'Artikel-Arten')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h1 class="h2 text-primary my-3">Lager: Artikel-Arten</h1>
                <ul class="list-group list-group-striped border">
                    @foreach($itemType as $iT)
                        <li class="list-group-item">
                            <span>{{ $iT->art }} (Priorität: {{ $iT->priorität }})</span>
                            <div class="float-right">
                                <a class="ml-2 btn btn-sm btn-outline-primary"
                                   href="/itemType/{{ $iT->id }}/edit">
                                    <i class="fas fa-edit"></i>
                                    Bearbeiten
                                </a>
                                <form style="display: inline;" action="/itemType/{{ $iT->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input onclick="return confirm('Wirklich löschen?')"
                                           class="btn btn-outline-danger btn-sm ml-2" type="submit" value="Löschen">
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <a class="btn btn-primary mt-4" href="/itemType/create">
                    <i class="fas fa-plus-circle mr-2"></i> Neue Art hinzufügen
                </a>
            </div>
        </div>
    </div>
@endsection
