@extends('dashboard.layout.app')

@section('main_content')

<section>
    <!-- start page title -->
    <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Website Settings</h4>
            </div>
            <div class="">
                <div class="row">
                    {{-- Website title & logo --}}
                    <div class="col-lg-6">
                        <div class="bg-white shadow-sm rounded-lg mb-4">
                            <div class="max-w-xl">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <form method="post" action="{{ url('/updateSystemInfo') }}" enctype="multipart/form-data">
                                            @csrf
                                            
                                            <div class="mb-3">
                                                <div class="card-title text-center mb-4">
                                                    <h4 class="mb-sm-0 font-size-18">System Information</h4>
                                                </div>
                                                
                                                {{-- Validation message --}}
                                                @if (Session::has('SiteInfoSuccessMsg'))
                                                    <div class="alert alert-success" role="alert">
                                                        {{ Session::get('SiteInfoSuccessMsg') }}
                                                    </div>
                                                @endif
                                                @if (Session::has('SiteInfoErrorMsg'))
                                                    <div class="alert alert-success" role="alert">
                                                        {{ Session::get('SiteInfoErrorMsg') }}
                                                    </div>
                                                @endif
                                                <label for="menu" class="form-label">{{ __('Site Logo') }}</label>
                                                <img class="img-fluid mt-2 w-25 h-25" src="{{ asset($siteInformationData->logo) }}" alt="logo">
                                                <input id="logo" name="logo" type="file" class="form-control mt-2" autofocus autocomplete="logo">
                                                @error('logo')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                
                                            <div class="mb-3">
                                                <label for="menu" class="form-label">{{ __('Title') }}</label>
                                
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" name="title" value="{{ $siteInformationData->title }}">
                                                </div>
                                
                                                @error('title')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                
                                            <div class="mb-3 d-grid">
                                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Website menu --}}
                    <div class="col-lg-6">
                        <div class="bg-white shadow-sm rounded-lg mb-4">
                            <div class="max-w-xl">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <div class="card-title text-center mb-4">
                                                <h4 class="mb-sm-0 font-size-18">Navigation Menu</h4>
                                            </div>

                                            {{-- Validation message --}}
                                            @if (Session::has('systemMenuSuccessMsg'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ Session::get('systemMenuSuccessMsg') }}
                                                </div>
                                            @endif
                                            @if (Session::has('systemMenuErrorMsg'))
                                                <div class="alert alert-danger" role="alert">
                                                    {{ Session::get('systemMenuErrorMsg') }}
                                                </div>
                                            @endif
                                                
                                            <form method="post" action="{{ url('/createSystemMenu') }}" class="mt-4">
                                                @csrf

                                                <label for="menu" class="form-label">{{ __('New Menu') }}</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="menu_name" placeholder="Menu name" required>
                                                    <input type="text" class="form-control" name="menu_link" placeholder="Menu link" required>
                                                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                                </div>
                                            </form>

                                            <div class="mb-2">
                                                <p class="m-0 fw-bold">{{ __('Current Menus') }}</p>
                                            </div>
                                            @forelse ($siteMenuData as $siteMenu)
                                                <form method="post" action="{{ url('updateSystemMenu/'.$siteMenu['id']) }}">
                                                    @csrf

                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" name="menu_name" value="{{ $siteMenu['navigation_menu_name'] }}" required>
                                                        <input type="text" class="form-control" name="menu_link" value="{{ $siteMenu['navigation_menu_link'] }}" required>
                                                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                                        <a href="../deleteSystemMenu/{{ $siteMenu['id'] }}" class="btn btn-danger" type="button">{{ __('Delete') }}</a>
                                                    </div>
                                                </form>
                                            @empty
                                                <div class="mb-3">
                                                    {{ ('No menu available') }}
                                                </div>
                                            @endforelse
                            
                                            @error('logo')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</section>

@endsection
