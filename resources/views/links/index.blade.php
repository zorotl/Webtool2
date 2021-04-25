@extends('layouts.app')

@section('sitetitle', 'Links')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h1 class="h2 text-primary my-3">Links</h1>
                <ul class="list-group list-group-striped border">
                    @foreach($links as $link)
                        <li class="list-group-item">
                            <span>
                                Name: {{ $link->link_name }} <br>
                                URL: {{ $link->link_url }} <br>
                                Reihenfolge: {{ $link->link_sort }}
                            </span>
                            <div class="float-right">
{{--                                <a class="ml-2 btn btn-sm btn-outline-primary" href="/link/{{ $link->id }}/edit">--}}
                                <a class="ml-2 btn btn-sm btn-outline-primary" href="{{ route('link.edit', [$link->id]) }}">
                                    <i class="fas fa-edit"></i>
                                    Bearbeiten
                                </a>
{{--                                <form style="display: inline;" action="/link/{{ $link->id }}" method="post">--}}
                                <form style="display: inline;" action="{{ route('link.destroy', [$link->id]) }}" method="post">
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
                <a class="btn btn-primary mt-4" href="{{ route('link.create') }}">
                    <i class="fas fa-plus-circle mr-2"></i> Neuen Link hinzufügen
                </a>
            </div>
        </div>
    </div>
@endsection
