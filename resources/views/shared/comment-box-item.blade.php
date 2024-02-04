<div class="d-flex align-items-start">
    <img style="width:50px; height: 50px" class="me-2 avatar-sm rounded-circle"
        src="{{ $comment->user->getImageUrl() }}" alt="User {{ $comment->user->name}} avatar">
    <div class="w-100">
        <div class="d-flex justify-content-between">
            <h6 class="">
                <a href="{{ route('users.show', $comment->user->id)}}"> {{ $comment->user->name }}</a>
            </h6>
            <small class="fs-6 fw-light text-muted">{{ $comment->created_at->diffForHumans() }}</small>
        </div>
        <p class="fs-6 mt-3 fw-light">
            {{ $comment->content }}
        </p>
    </div>
</div>