@extends('frontend.layout.app')
@section('frontend_content')

        <!-- Job Details Section -->
        <section id="jobdetails">
            <div class="container bg-white my-4">
                <div class="col-md-12 p-3">
                    <!-- Job Details Header Section -->
                    <div class="jobdetails_header">
                        <div class="row">
                            <div class="">
                                <h3 class="text-primary text-center">Application Form</h3>
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
                            </div>
                        </div>
                    </div>

                    <!-- Job Details Summary Section -->
                    <div class="jobdetails_summary">
                        <div class="card mb-4">
                        <form action="{{route('job_submit')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                            <div class="card-body">
                            <input type="text" name="company_id" value="{{ $job_details->company_id }}" hidden>
                                <input type="text" name="job_id" value="{{ $job_details->id }}" hidden>
                                
                                <div class="row summary_body">
                                    <div class="col-md-4 col-sm-12">
                                        <p class="mb-1">Full Name: {{ auth()->user()->name }}</p>
                                        <p class="mb-1">Email: {{ auth()->user()->email }}</p>
                                    </div>

                                    <div class="col-md-8 col-sm-12 alert alert-danger">
                                    <p class="mb-1">Apply For: {{ $job_details->designation }}</p>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" id="s_first_name" name="first_name" class="form-control"  placeholder="First Name" required/>
                                            <label class="form-label" for="s_first_name">First Name</label>
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" id="s_last_name" name="last_name" class="form-control" placeholder="Last Name" required/>
                                            <label class="form-label" for="s_last_name">Last Name</label>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="text" id="address" name="address" class="form-control" placeholder="Address" required/>
                                        <label class="form-label" for="address">Address</label>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-floating">
                                                <select class="form-select" name="gender" id="floatingSelectGrid" aria-label="Floating label select example" required>
                                                    <option selected>Choose an Item</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="others">Others</option>
                                                </select>
                                                <label for="floatingSelectGrid">Gender</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-floating mb-4">
                                        <input type="date" id="s_date" name="dob" class="form-control " placeholder="Select Your Birthday" required/>
                                        <label class="form-label" for="s_date">Date of Birth</label>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="file" id="s_image" name="image" class="form-control " />
                                        <label class="form-label" for="s_image">Image</label>
                                    </div>

                                    <div class="form-floating mb-4">
                                        <input type="file" id="s_sig" name="signature" class="form-control " />
                                        <label class="form-label" for="s_sig">Signature</label>
                                    </div>

                                    <div class="form-floating mb-4">
                                        <input type="file" id="s_cv" name="cv" class="form-control "/>
                                        <label class="form-label" for="s_cv">Upload Your CV</label>
                                    </div>

                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="checkbox" value="" id="form_check" />
                                        <label class="form-check-label" for="form_check">
                                        Agree to terms and agreement
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center align-items-center m-3">
                                    
                                    <button name="apply_buuton" type="submit" class="btn btn-success">Submit Form</button>

                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </section>

    @endsection
