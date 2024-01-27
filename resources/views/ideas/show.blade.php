@extends('layout.layout')
@section('main-content')
<div class="row">
    <div class="col-3">
        {{-- side navigation --}}
        @include("shared.side-navigation")
    </div>
    <div class="col-6">
        {{-- conditional alert box --}}
        @include("shared.alert-success-message")

        {{-- Main Content --}}
        @include("shared.dashboard-card")
    </div>
    <div class="col-3">
        {{-- Search bar --}}
        @include("shared.search-bar")

        {{-- who to follow box --}}
        <div class="mt-3">
            @include("shared.who-to-follow")
        </div>
    </div>
</div>

@endsection