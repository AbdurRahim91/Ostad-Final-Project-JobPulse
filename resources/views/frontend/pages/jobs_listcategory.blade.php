@extends('frontend.layout.app')
@section('frontend_content')

<section id="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-content text-center">
                    <h1>All Jobs By Category</h1>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- public jobs --}}
<section id="recent-public-jobs">
    <div class="container bg-white my-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="cmn-header text-center pt-5">
                    <h4>{{ $cat_id->category_name }}</h4>
                </div>
            </div>
        </div>
        <div class="job-content-inner">
            <div class="col-md-12 p-3">
                <!-- Job List Content Section -->
                <!-- Job List Item -->
                <div class="joblist_content">
                    <!-- Job List Item -->
                @forelse ($jobsList as $Jobs)
                <div class="joblist_item mb-2">

                    <div class="card mb-4">
                    <a href="{{ route('job-details', $Jobs->id)}}" target="_blank" class="fs-5 fw-bold">
                            <div class="card-body">
                                <div class="col-12">
                                    <a href="{{ route('job-details', $Jobs->id)}}" target="_blank"
                                        class="text-primary text-decoration-none fs-5 fw-bold">{{$Jobs->designation}}</a>
                                    <p class="fw-bold mb-3">{{$Jobs->organization_name}}</p>
                                    <p class="text-gray mb-1"><i class="fa-solid fa-location-dot"></i> {{$Jobs->job_location}}</p>
                                    <p class="mb-1"><i class="fa-solid fa-graduation-cap"></i>{{$Jobs->education}}</p>

                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <p class="mb-1"><i class="fa-solid fa-briefcase"></i> {{$Jobs->experience}}</p>
                                    </div>

                                    <div class="col-6 text-end">
                                        <p class="mb-1"><i class="fa fa-calendar"></i> Deadline: <b>{{$Jobs->application_deadline}}</b></p>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                  
                    </div>

                    <!-- For Empty -->
                    @empty
                    <div class="joblist_item mb-2">
                        <div class="card mb-4">
                                <div class="card-body">
                                    <div class="col-12">
                                        <p>No jobs found.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
                   {{-- list 2 --}}
                    <div class="view-more-btn text-center">
                        <a href="" class="btn btn-primary text-center">Paginate</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
