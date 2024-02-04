<div>
    @auth
    @include('shared.comment-box-form')
    @endauth

    <hr />
    @forelse ($idea->comments as $comment)
    @include('shared.comment-box-item')
    @empty
    <p class="text-center mt-4">{{ __("app.no_comments_found_in_idea")}}</p>
    @endforelse
</div>