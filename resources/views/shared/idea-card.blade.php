<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px; height: 50px" class="me-2 avatar-sm rounded-circle"
                    src="{{ $idea->user->getImageUrl() }}" alt="User {{ $idea->user->name }} avatar">
                <div>
                    <h5 class="card-title mb-0"><a href='{{ route("users.show", $idea->user->id)}}'> {{
                            $idea->user->name }}
                        </a></h5>
                </div>
            </div>
            @include('shared.idea-card-actions')
        </div>
    </div>
    <div class="card-body">
        @if ($isEditting ?? false)
        <div class="row">
            <form action='{{ route("ideas.update", $idea->id) }}' method="POST">
                @csrf
                @method("put")
                <div class="mb-3">
                    <textarea name="content" class="form-control" id="content" rows="3">{{ $idea->content }}</textarea>
                    @error("idea")
                    <span class="d-block fs-6 mt-3 text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="">
                    <button type="submit" class="btn btn-dark"> {{ __("app.update_text")}} </button>
                </div>
            </form>
        </div>
        @else
        <p class="fs-6 fw-light text-muted">
            {{ $idea->content }}
        </p>
        <div class="d-flex justify-content-between">
            @include("shared.idea-card-like-button")
            @include("shared.idea-card-timestamp")
        </div>
        <div class="mt-2">
            @include("shared.comment-box")
        </div>
        @endif
    </div>
</div>