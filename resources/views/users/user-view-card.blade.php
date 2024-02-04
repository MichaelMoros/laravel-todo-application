<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:128px; height:128px" class="me-3 avatar-sm rounded-circle"
                    src="{{ $user->getImageUrl()}}" alt="User{{ $user->name }} avatar" />
                <div>
                    <h3 class="card-title mb-0"><a href="#"> {{ $user->name }}
                        </a></h3>
                    <span class="fs-6 text-muted">{{$user->email}}</span>
                </div>
            </div>
            <div>
                @can('update', $user)
                <a href='{{ route("users.edit", $user->id)}}'>{{__("app.update_profile")}}</a>
                @endcan
            </div>
        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> {{ __("app.bio_text")}}: </h5>
            <p class="fs-6 fw-light">
                {{ $user->bio ?? "This user hasn't set a bio yet."}}
            </p>

            <div class="mt-3">
                @include('users.shared.user-stats')
            </div>
        </div>
    </div>
</div>