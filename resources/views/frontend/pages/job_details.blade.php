@extends('frontend.layout.app')
@section('frontend_content')

<section id="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-content text-center">
                    <h1>Job Details Page</h1>
                </div>
            </div>
        </div>
    </div>
</section>

        <!-- Job Details Section -->
        <section id="jobdetails">
            <div class="container bg-white my-4">
                <div class="col-md-12 p-3">
                    <!-- Job Details Header Section -->
                    <div class="jobdetails_header">
                        <div class="row">
                                @if(session('success'))
                                    <div class="alert alert-success text-center">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                 @if(session('error'))
                                    <div class="alert alert-danger text-center">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            <div class="col-sm-6">
                                <h3>Company Name: {{ $job_details->organization_name }}</h3>
                                <h3 class="text-primary">{{ $job_details->designation }}</h3>
                            </div>
                            <div class="col-sm-6 text-end">
                                <div class="company_logo">
                                    <img src="{{ asset('backend/assets/images/company/' . $job_details->company_logo) }}" alt="company_logo">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 mb-5">
                            <p>Application Deadline: <span class="text-primary fw-bold">{{ $job_details->application_deadline }}</span></p>
                        </div>
                    </div>

                    <!-- Job Details Summary Section -->
                    <div class="jobdetails_summary">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="col-12 mb-4 summary_title">
                                    <h5 class="text-primary">Summary</h5>
                                </div>
                                <div class="row summary_body">
                                    <div class="col-md-4 col-sm-12">
                                        <p class="mb-1">Vacency: <b>{{ $job_details->vacancy_count }}</b></p>
                                        <p class="mb-1">Published: <b>{{ $job_details->published_date }}</b></p>
                                        <!-- <p class="mb-1">Application Deadline: <b>{{ $job_details->application_deadline }}</b></p> -->
                                    </div>

                                    <div class="col-md-4 col-sm-12">
                                        <p class="mb-1">Location: <b>{{ $job_details->job_location }}</b></p>
                                    </div>

                                    <div class="col-md-4 col-sm-12">
                                        <p class="mb-1">Minimum Salary: <b>Tk. {{ $job_details->minimum_salary }} (Monthly)</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Job Details Content Section -->
                    <div class="jobdetails_content">
                        <div class="card">
                            <div class="card-body">

                            <!-- Education -->
                            <div class="col-12 py-3 border-bottom jobdetails_content_body">
                                    <div class="mb-2 jobdetails_content_title">
                                        <h5 class="text-primary">Educational Qualification</h5>
                                    </div>
                                    <div class="jobdetails_content_text">
                                    {{ $job_details->education }}
                                    </div>
                                </div>

                            <!-- Job Experience -->
                            <div class="col-12 py-3 border-bottom jobdetails_content_body">
                                <div class="mb-2 jobdetails_content_title">
                                    <h5 class="text-primary">Experience</h5>
                                </div>
                                <div class="jobdetails_content_text">
                                {{ $job_details->experience }}
                                </div>
                            </div>
                            <!-- Job Requirements -->
                                <div class="col-12 py-3 border-bottom jobdetails_content_body">
                                    <div class="mb-2 jobdetails_content_title">
                                        <h5 class="text-primary">Requirements</h5>
                                    </div>
                                    <div class="jobdetails_content_text">
                                    {{ $job_details->requirements }}
                                    </div>
                                </div>

                                <!-- Job Responsibility -->
                                <div class="col-12 border-bottom py-3 jobdetails_content_body">
                                    <div class="mb-2 jobdetails_content_title">
                                        <h5 class="text-primary">Responsibilities & Context</h5>
                                    </div>
                                    <div class="jobdetails_content_text">
                                    {{ $job_details->responsibilities }}
                                    </div>
                                </div>

                                <!-- Job Benefit -->
                                <div class="col-12 border-bottom py-3 jobdetails_content_body">
                                    <div class="mb-2 jobdetails_content_title">
                                        <h5 class="text-primary">Compensation & Other Benefits</h5>
                                    </div>
                                    <div class="jobdetails_content_text">
                                    {{ $job_details->benefits }}
                                    </div>
                                </div>

                                <!-- Job Employment -->
                                <div class="col-12 py-3 jobdetails_content_body">
                                    <div class="mb-2 jobdetails_content_title">
                                        <h5 class="text-primary">Employment Status</h5>
                                    </div>
                                    <div class="jobdetails_content_text">
                                    {{ $job_details->employment_status }}
                                    </div>
                                </div>

                                <!-- Job Location -->
                                <div class="col-12 py-3 jobdetails_content_body">
                                    <div class="mb-2 jobdetails_content_title">
                                        <h5 class="text-primary">Job Loacation</h5>
                                    </div>
                                    <div class="jobdetails_content_text">
                                    {{ $job_details->job_location }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="d-flex justify-content-center align-items-center m-3">

                    <a href="{{ route('apply_job', $job_details->id)}}" target="_blank" type="button" class="btn btn-success text-decoration-none fs-5 fw-bold">
                     Apply Now
                    </a>
                </div>
            </div>
            
        </section>

    @endsection
