<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="{{ (Route::is('dashboard')) ? " nav-link text-white bg-primary rounded" : "nav-link" }}"
                    href="{{ route('dashboard') }}">
                    <span>Home</span></a>
            </li>
            <li class="nav-item">
                <a class="{{ (Route::is('feed')) ? " nav-link text-white bg-primary rounded" : "nav-link" }}"
                    href="{{ route('feed') }}">
                    <span>Feed</span></a>
            </li>
            @auth
            <li class="nav-item">
                <a class="{{ (Route::is('profile')) ? " nav-link text-white bg-primary rounded" : "nav-link" }}"
                    href="{{ route('profile') }}">
                    <span>Profile</span></a>
            </li>
            @endauth
        </ul>
    </div>
    <div class="card-footer text-center py-2">
        <a class="btn btn-link btn-sm" href="{{ route('lang', ['lang' => 'en']) }}">EN</a>
        <a class="btn btn-link btn-sm" href="{{ route('lang', ['lang' => 'es']) }}">ES</a>
        <a class="btn btn-link btn-sm" href="{{ route('lang', ['lang' => 'tl']) }}">TL</a>
    </div>
</div>