@extends('layouts.app')

@section('sitetitle', 'Home')

@section('content')
    <div class="container-xl">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <h1 class="text-primary my-4">Webtools, die den Alltag erleichtern</h1>
{{--        <h2 class="h3 text-primary my-4">Webtools, die den Alltag erleichtern</h2>--}}

{{--        <div class="row">--}}
{{--            <div class="col-md-12">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <h3 class="card-title text-primary">Lager-Verwaltung</h3>--}}
{{--                        <p class="card-text">--}}
{{--                            Das Tool "Lager-Verwaltung" ist genau das, was der Name verspricht.<br><br>--}}
{{--                            Verwalten Sie ihre Artikel in einem mehrstufigen Lagersystem,--}}
{{--                            damit Sie stets den Überblick behalten. Organisieren Sie ihre Artikel--}}
{{--                            (z.B. neue Artikel, Geräte oder Ersatzteile) in verschiedene Lager-Gruppen,--}}
{{--                            in denen sich wiederum diverse Lager und Lagerort befinden.<br><br>--}}
{{--                            So behalten Sie stehts die Übersicht.--}}
{{--                        </p>--}}
{{--                        <a href="#" class="btn btn-primary">Artikel im Lager suchen</a>--}}
{{--                        <a href="#" class="btn btn-primary ml-3">Artikel im Lager hinzufügen</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="row">
            <div class="col-md-6 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-primary">Lager-Verwaltung</h3>
                        <p class="card-text">
                            Die Lager-Verwaltung ist, was der Name verspricht.<br><br>
                            Verwalten Sie ihre Artikel in einem mehrstufigen Lagersystem.
                            Organisieren Sie ihre Artikel in verschiedenen Lagern, Lagerorten und Lagerplätzen.<br><br>
                            So behalten Sie stehts die Übersicht.
                        </p>
                        <a href="{{ route('item.index') }}" class="btn btn-primary">Artikel anzeigen</a>
                        <a href="{{ route('item.create') }}" class="btn btn-primary ml-3">Artikel hinzufügen</a>
                    </div>
                </div>
            </div>
{{--            <div class="col-md-6 mt-3">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <h3 class="card-title text-primary">Shop</h3>--}}
{{--                        <p class="card-text">--}}
{{--                            Das Tool "Shop" ist ein kleiner Helfer, der das Nachbestellen von lagergeführten Artikeln--}}
{{--                            erleichtert.<br><br> Wie schnell passiert es, dass ein Artikel nicht nachbestellt wird.--}}
{{--                            Nicht mit diesem nützlichen--}}
{{--                            Tool. Man hat stehts den Überblick, was noch nachbestellt werden muss oder für welchen--}}
{{--                            Artikel noch eine Lieferung aussteht?<br><br> Ebenfalls gibt es eine History, in der festgehalten--}}
{{--                            wird, wer an welchem Tag welchen Artikel benötigt hat.--}}
{{--                        </p>--}}
{{--                        <a href="#" class="btn btn-primary">Artikel im Shop suchen</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-md-6 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-primary">Preis-Rechner</h3>
                        <p class="card-text">
                            Der Preis-Rechner ist ein nützlicher Helfer im Alltag, der Fehler beim
                            Umrechnen von Preisen minimiert.<br><br>
                            Fix hinterlegte Formeln machen das Umrechnen zum Kinderspiel.<br><br>
                            Das Resultat nehmen Sie direkt in den Zwischenspeicher.
                            So sind sie auch von Tippfehlern sicher.
                        </p>
                        <a href="{{ route('calculator.index') }}" class="btn btn-primary">Zum Rechner</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
