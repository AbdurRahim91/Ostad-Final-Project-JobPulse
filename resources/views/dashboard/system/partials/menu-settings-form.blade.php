<div class="card shadow-sm">
    <div class="card-body">
        @if (Session::has('successMsg'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('successMsg') }}
            </div>
        @endif
        @if (Session::has('errorMsg'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('errorMsg') }}
            </div>
        @endif

        <form method="post" action="{{ url('/updateLogo') }}" class="mt-4" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label for="logo" class="form-label">{{ __('Logo') }}</label>
                    <img class="img-fluid mt-2 w-25 h-25" src="{{ asset($settingsLogoData['logo']) }}" alt="logo">
                <input id="logo" name="logo" type="file" class="form-control mt-2" required autofocus autocomplete="logo">
                @error('logo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="menu" class="form-label">{{ __('Navigation Menu') }}</label>

                @foreach ($settingsMenuData as $settingsMenu)
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="menu_name" value="{{ $settingsMenu['navigation_menu_name'] }}">
                    <input type="text" class="form-control" name="menu_link" value="{{ $settingsMenu['navigation_menu_link'] }}">
                    <a href="../deleteMenu/{{ $settingsMenu['id'] }}" class="btn btn-danger" type="button">Delete</a>
                </div>
                @endforeach

                @error('logo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 d-grid">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            </div>
        </form>
    </div>
</div>