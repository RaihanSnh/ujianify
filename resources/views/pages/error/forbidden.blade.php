@extends('pages.error.base')

@section('error')
    <div class="flex flex-col gap-2">
        <div class="flex w-full justify-center">
            <div class="flex flex-col gap-4">
                <div>403 Forbidden</div>
                <div class="font-normal text-lg">You do not have permission to access this path!</div>
            </div>
        </div>
    </div>
@endsection
