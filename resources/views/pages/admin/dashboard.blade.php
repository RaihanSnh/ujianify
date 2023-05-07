@extends('pages.admin.base')

@section('header', 'Dashboard')

@section('container')
    <x-modal-open id="cuy">
        <x-button>
            Open cuy
        </x-button>
    </x-modal-open>

    <x-modal id="cuy">
        Hello cuy
    </x-modal>
@endsection
