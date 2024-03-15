@extends('frontend.layout.app')
@section('frontend_content')

<section id="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-content text-center">
                    <h1>Jobs Pages</h1>
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
                    <h4>Recent Public Jobs</h4>
                </div>
            </div>
        </div>
        <div class="job-content-inner">
            <div class="col-md-12 p-3">
                <!-- Job List Content Section -->
                <!-- Job List Item -->
                <div class="joblist_content">
                    @foreach ($jobPage as $Jobs)
                    <div class="joblist_item mb-2">
                        <div class="card mb-4">
                            <div class="row p-3">
                                <div class="col-8">
                                    <h2><a href="{{route('job-details', $Jobs->id)}}" class="text-primary text-decoration-none fs-5 fw-bold">{{$Jobs->designation}}</a></h2>
                                    <h5 class="fs-5 fw-bold">{{$Jobs->organization_name}}</h5>
                                    <ul class="d-flex card-listss">
                                        <li class="text-gray mb-1"><i class="fa-solid fa-location-dot"></i> {{$Jobs->job_location}}
                                        </li>
                                        <li class="text-gray mb-1"><i class="fa-solid fa-briefcase"></i> {{$Jobs->employment_status}}</li>
                                        <li class="text-gray mb-1"><i class="fa-solid fa-briefcase"></i> Job Type</li>
                                        <li class="text-gray mb-1"><i class="fa-solid fa-bangladeshi-taka-sign"></i>{{$Jobs->minimum_salary}}</li>
                                    </ul>
                                    <p class="mb-1 requirements-text"><i class="fa-solid fa-graduation-cap"></i>
                                        {{$Jobs->requirements}}</p>
                                    <ul class="d-flex card-listss">
                                        <li><i class="fa fa-clock"></i> Posted: {{$Jobs->published_date}}</li>
                                        <li><i class="fa fa-clock"></i> Deadline: {{$Jobs->application_deadline}}</li>
                                    </ul>
                                </div>
                                <div class="col-4 text-end apply-btn">
                                    <a href="" class="btn btn-primary text-center">Apply Now</a>
                                </div>
                                <div class="col-4 text-end">
                                    <img src="{{ asset('backend/assets/images') }}/{{ $Jobs->image }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                   {{-- list 2 --}}
                    <div class="view-more-btn text-center">
                        <a href="{{ $jobPage->links() }}" class="btn btn-primary text-center">Paginate</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
{{-- public jobs --}}
@endsection
