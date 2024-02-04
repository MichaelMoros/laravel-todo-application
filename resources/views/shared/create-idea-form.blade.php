@auth
<h4>{{__("app.share_your_ideas")}}</h4>
<div>
    <form action="{{ route('ideas.store') }}" method="POST">
        <div class="d-flex flex-column align-items-stretch">
            @csrf
            <div class="mb-3">
                <textarea name="content" class="form-control" id="content" rows="3" maxlength="255"
                    oninput="updateCharacterCount(this)"></textarea>
                @error('content')
                <span class="d-block fs-6 mt-3 text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-dark">{{ __("app.share_text")}}</button>
                <div id="characterCount" class="text-muted mt-2">0/255</div>
            </div>
        </div>
    </form>
</div>
@endauth

@guest
<h4>{{ __("ideas.dashboard_login_to_share")}}</h4>
@endguest
<script>
    function updateCharacterCount(textarea) {
        var characterCount = textarea.value.length;
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