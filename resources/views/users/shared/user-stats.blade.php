<div class="d-flex justify-content-start">
    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
        </span> {{ $user->followers()->count() }} Followers </a>
    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
        </span> {{ $user->ideas()->count() }} </a>
    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-comment me-1">
        </span> {{ $user->comments()->count() }} </a>
    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-heart me-1">
        </span> {{ $user->likes()->count() }} </a>
</div>

@auth
@if (Auth::id() !== $user->id)
<div class="mt-3">
    @if (Auth::user()->follows($user))
    <form action="{{ route('users.unfollow', $user->id)}}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary btn-sm"> {{ __("app.unfollow_text")}} </button>
    </form>
    @else
    <form action="{{ route('users.follow', $user->id)}}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary btn-sm"> {{ __("app.follow_text")}} </button>
    </form>
    @endif
</div>
@endif
@endauth