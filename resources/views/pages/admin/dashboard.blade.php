@extends('pages.admin.base')

@section('header', 'Dashboard')

@section('container')
    @component('components.input.datetime', ['name' => 'dash']) @endcomponent
@endsection
