@extends('layout.layout')
@section('title', 'View Idea')
@section('main-content')
<div class="row">
    <div class="col-3">
        @include("shared.side-navigation")
    </div>
    <div class="col-6">
        @include("shared.alert-success-message")

        @include("shared.idea-card")
    </div>
    <div class="col-3">
        @include("shared.search-bar")

        <div class="mt-3">
            @include("shared.who-to-follow")
        </div>
    </div>
</div>

@endsection