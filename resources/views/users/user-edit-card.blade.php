<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form action="{{ route('users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("patch")
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle" src="{{ $user->getImageUrl() }}"
                        alt="{{ $user->name }} Avatar">
                    <div>
                        <input type="text" name="name" id="name" class="form-control" value='{{ $user->name }}' />
                        @error('name')
                        <p class="text-danger fs-6">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div>
                    @auth
                    @if (Auth::user()->id === $user->id)
                    <a href='{{ route("users.show", $user->id)}}'>{{ __("app.cancel_edit")}}</a>
                    @endif
                    @endauth
                </div>
            </div>
            <div class="mt-4">
                <label for="url">{{ __("app.profile_avatar")}}</label>
                <input type="file" name="url" id="url" class="form-control">
            </div>
            <div class="px-2 mt-3">
                <h5 class="fs-5"> {{ __("app.bio_text")}}: </h5>
                <div class="d-flex flex-column align-items-stretch">
                    <div class="mb-3">
                        <textarea name="bio" class="form-control" id="bio" rows="3" maxlength="255"
                            oninput="updateCharacterCount(this)">{{ Auth::user()->bio }}</textarea>
                        @error('bio')
                        <span class="d-block fs-6 mt-3 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-dark">{{ __("app.update_bio")}}</button>
                        <div id="characterCount" class="text-muted mt-2">{{ Str::length(Auth::user()->bio) }}/255</div>
                    </div>
                </div>
                <div class="mt-3">
                    @include('users.shared.user-stats')
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function updateCharacterCount(textarea) {
        var characterCount = textarea.value.length
        var maxCharacters = parseInt(textarea.getAttribute('maxlength'));
        var counterElement = document.getElementById('characterCount');
        counterElement.innerText = characterCount + '/' + maxCharacters;

        // Optionally, you can style the counter based on the number of characters
        if (characterCount > maxCharacters) {
            counterElement.style.color = 'red';
        } else {
            counterElement.style.color = 'inherit';
        }
    }
</script>