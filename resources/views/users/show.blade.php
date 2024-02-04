@extends('layout.layout')
@section('title', $user->name)
@section('main-content')
<div class="row">
    <div class="col-3">
        @include("shared.side-navigation")
    </div>
    <div class="col-6">
        @include("shared.alert-success-message")
        @include('users.user-view-card')
        <hr />
        @forelse ($ideas as $idea)
        <div class="mt-3">
            @include("shared.idea-card")
        </div>
        @empty
        <p class="text-center mt-4">{{__("app.no_results_found")}}</p>
        @endforelse

        <div class="mt-3">
            {{ $ideas->links() }}
        </div>
    </div>
    <div class="col-3">
        @include("shared.search-bar")
        <div class="mt-3">
            @include("shared.who-to-follow")
        </div>
    </div>
</div>

@endsection