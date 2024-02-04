<form action='{{ route("ideas.comments.store", $idea->id)}}' method="POST">
    @csrf
    <div class="mb-3">
        <textarea name="content" class="fs-6 form-control" rows="1"></textarea>
        @error('content')
        <span class="d-block fs-6 mt-3 text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <button class="btn btn-primary btn-sm" type="submit">{{ __('app.post_comment')}} </button>
    </div>
</form>