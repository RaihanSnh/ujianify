@extends('pages.error.base')

@section('error')
    <div class="flex flex-col gap-2">
        <div>Forbidden</div>
        <div class="font-normal text-lg">You do not have permission to access this path!</div>
    </div>
@endsection
