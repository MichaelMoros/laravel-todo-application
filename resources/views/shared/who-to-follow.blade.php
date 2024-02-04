<div class="card mt-3">
    <div class="card-header pb-0 border-0">
        <h5 class="">{{__("app.top_users")}}</h5>
    </div>
    <div class="card-body">
        @if ($topUsers ?? false)
        @forelse($topUsers as $user)
        <div class="hstack gap-2 mb-3">
            <div class="avatar">
                <a href="{{ route('users.show', $user->id)}}"><img style="width: 50px; height:50px"
                        class="avatar-img rounded-circle" src="{{ $user->getImageUrl() }}"
                        alt="{{ $user->name}} avatar"></a>
            </div>
            <div class="overflow-hidden">
                <a class="h6 mb-0" href="{{ route('users.show', $user->id)}}">{{$user->name}}</a>
                <p class="mb-0 small text-truncate">{{ $user->email }}</p>
            </div>
        </div>
        @empty
        <p class="text-center mt-4">{{__("app.no_users_to_follow")}}</p>
        @endforelse
        @else
        <p class="text-center mt-4">{{__("app.no_users_to_follow")}}</p>
        @endif
    </div>
</div>