<div class="card">
    <div class="card-header pb-0 border-0">
        <h5 class="">{{ __("app.search_text")}}</h5>
    </div>
    <div class="card-body">
        <form action='{{ route("dashboard")}}' method="GET">
            <input value="{{ request('search') }}" name="search" placeholder="..." class="form-control w-100"
                type="text" id="search">
            <button type="submit" class="btn btn-dark mt-2"> {{ __("app.search_text")}}</button>
        </form>
    </div>
</div>