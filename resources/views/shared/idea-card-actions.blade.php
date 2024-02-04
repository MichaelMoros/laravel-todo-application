<div class="d-flex">
    @auth
    @if (!Route::is('ideas.show', $idea->id) && !Route::is('ideas.edit', $idea->id))
    <a class="mx-2" href='{{ route("ideas.show", $idea->id)}}'>{{ __("app.view_text")}}</a>
    @can('update', $idea)
    <a class="mx-2" href='{{ route("ideas.edit", $idea->id)}}'>{{ __("app.edit_text")}}</a>
    @endcan
    @can('delete', $idea)
    <form method="POST" action='{{ route("ideas.destroy", $idea->id) }}'>
        @csrf
        @method("delete")
        <button type="submit" class="btn btn-danger btn-sm">X</button>
    </form>
    @endcan


    @elseif (Route::is('ideas.edit', $idea->id))
    <a class="mx-2" href='{{ route("ideas.show", $idea->id)}}'>{{ __("app.cancel_edit")}}</a>
    @can('delete', $idea)
    <form method="POST" action='{{ route("ideas.destroy", $idea->id) }}'>
        @csrf
        @method("delete")
        <button type="submit" class="btn btn-danger btn-sm">X</button>
    </form>
    @endcan

    @elseif (Route::is('ideas.show', $idea->id))
    @can('update', $idea)
    <a class="mx-2" href='{{ route("ideas.edit", $idea->id)}}'>{{ __("app.edit_text")}}</a>
    @endcan

    @can('delete', $idea)
    <form method="POST" action='{{ route("ideas.destroy", $idea->id) }}'>
        @csrf
        @method("delete")
        <button type="submit" class="btn btn-danger btn-sm">X</button>
    </form>
    @endcan
    @endif
    @endauth

    @guest
    @if (!Route::is('ideas.show', $idea->id))
    <a class="mx-2" href='{{ route("ideas.show", $idea->id)}}'>{{ __("app.view_text")}}</a>
    @endif
    @endguest
</div>