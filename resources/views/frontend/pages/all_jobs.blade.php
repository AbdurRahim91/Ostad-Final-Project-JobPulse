@extends('frontend.layout.app')
@section('frontend_content')

<section id="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-content text-center">
                    <h1>Find Best Jobs For You</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Total Jobs By categories -->
<section id="top-company">
    <div class="container bg-white my-4">
        <div class="row py-5">
            <div class="col-lg-12">
                <div class="cmn-header text-center">
                    <h4>Jobs Categories</h4>
                </div>
            </div>
        </div>
        <div class="top-company-content py-5 px-3">
            <div class="row">
                @foreach ($jobPublished as $jp)
                <div class="col-lg-4 mb-4">
                    <div class="card top-company-inner">
                        <div class="card-body">
                           <a href="{{ route('alljobs-by-category', $jp->category_id)}}">
                            <h5 class="cat_name">{{$jp->category_name}} [ {{$jp->total_jobs}} ]</h5>
                           </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<section id="recent-public-jobs">
    <div class="container bg-white my-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="cmn-header text-center pt-5">
                    <h4>Recent Published Jobs List</h4>
                </div>
            </div>
        </div>

        <div class="job-content-inner">
            <div class="col-md-12 p-3">
                <!-- Job List Content Section -->
                <!-- Job List Item -->
                <div class="joblist_content">
                @foreach ($jobsList as $Jobs)
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
                    @endforeach
                    <div class="view-more-btn text-center">
                        <a href="" class="btn btn-primary text-center">View More</a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

@endsection
