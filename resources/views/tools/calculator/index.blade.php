@extends('layouts.app')

@section('sitetitle', 'Preis-Rechner')

@section('content')
    <div class="container-fluid">
        <div class="row">
{{--            <calculator :calculator="{{ $calculator }}"></calculator>--}}
            <calculator></calculator>
            <calculator-result></calculator-result>
        </div>
    </div>
@endsection
