@extends('layouts.app')

@section('sitetitle', 'Lager-Verwaltung')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h1 class="h2 text-primary my-3">Lager: Lager-Verwaltung</h1>
                <ul class="list-group list-group-striped border">
                    @foreach($warehouses as $w)
                        <li class="list-group-item">
                            <span>{{ $w->lager }}</span>
                            <div class="float-right">
                                <a class="ml-2 btn btn-sm btn-outline-primary"
                                   href="/warehouse/{{ $w->id }}/edit">
                                    <i class="fas fa-edit"></i>
                                    Bearbeiten
                                </a>
                                <form style="display: inline;" action="/warehouse/{{ $w->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input onclick="return confirm('Wirklich löschen?')"
                                           class="btn btn-outline-danger btn-sm ml-2" type="submit" value="Löschen">
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <a class="btn btn-primary mt-4" href="/warehouse/create">
                    <i class="fas fa-plus-circle mr-2"></i> Neues Lager hinzufügen
                </a>
            </div>
        </div>
    </div>
@endsection
