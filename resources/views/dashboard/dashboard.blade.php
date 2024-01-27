@extends('layout.layout')
@section('main-content')
<div class="row">
    <div class="col-3">
        {{-- sidebar left navigation --}}
        @include("shared.side-navigation")
    </div>
    <div class="col-6">
        {{-- conditional alert message --}}
        @include("shared.alert-success-message")

        {{-- create new idea form --}}
        @include("shared.create-idea-form")
        @foreach ($ideas as $idea)
        <div class="mt-3">
            @include("shared.dashboard-card")
        </div>
        @endforeach

        <div class="mt-3">
            {{ $ideas->links() }}
        </div>
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