@extends('layouts.app')

@section('sitetitle', 'Marken')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h1 class="h2 text-primary my-3">Lager: Marke</h1>
                <ul class="list-group list-group-striped border">
                    @foreach($brands as $b)
                        <li class="list-group-item">
                            <span>{{ $b->marke }}</span>
                            <div class="float-right">
                                <a class="ml-2 btn btn-sm btn-outline-primary"
                                   href="/brand/{{ $b->id }}/edit">
                                    <i class="fas fa-edit"></i>
                                    Bearbeiten
                                </a>
                                <form style="display: inline;" action="/brand/{{ $b->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Wirklich löschen?')" class="btn btn-outline-danger btn-sm ml-2" type="submit">
                                        <i class="far fa-trash-alt mr-1"></i> Löschen
                                    </button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <a class="btn btn-primary mt-4" href="/brand/create">
                    <i class="fas fa-plus-circle mr-2"></i> Neue Marke hinzufügen
                </a>
            </div>
        </div>
    </div>
@endsection
