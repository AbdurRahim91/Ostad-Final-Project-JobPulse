@extends('dashboard.layout.app')

@section('main_content')

<section>
    <!-- start page title -->
    <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Profile Setting</h4>
            </div>
            <div class="">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="bg-white shadow-sm rounded-lg mb-4">
                            <div class="max-w-xl">
                                @include('dashboard.profile.partials.update-profile-information-form')
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="bg-white shadow-sm rounded-lg mb-4">
                            <div class="max-w-xl">
                                @include('dashboard.profile.partials.update-password-form')
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-6">
                        <div class="p-4 bg-white shadow-sm rounded-lg mb-4">
                            <div class="max-w-xl">
                                @include('dashboard.profile.partials.delete-user-form')
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>

</section>

@endsection
