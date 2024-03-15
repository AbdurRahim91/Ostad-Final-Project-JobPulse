@extends('dashboard.layout.app')

@section('main_content')

<section>
  @php
     $role=Auth()->user()->role;
      echo $role;
  @endphp
 
 @if (Auth()->check() && $role == 2)
  <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                      <img src="..." class="rounded me-2" alt="...">
                      <strong class="me-auto">Bootstrap</strong>
                      <small>11 mins ago</small>
                      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                      Hello, world! This is a toast message.
                    </div>
                  </div>
                <div class="company-inner card mt-5">
                    <h1 class="text-center pt-4 pb-4 border-bottom">Job Post Create</h1>
                    <form action="{{route('company.store')}}" method="POST" enctype="multipart/form-data" class="row g-3 p-4">
                        @csrf
                    <div class="col-md-6">
                          <label for="organization_name"class="form-label">Organization Name</label>
                          <input name="organization_name" placeholder="organization name" type="text" class="form-control" id="organization_name">
                          @error('organization_name')
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                        <div class="col-md-6">
                          <label for="designation" class="form-label">designation</label>
                          <input name="designation" placeholder="designation" type="text" class="form-control" id="designation">
                          @error('designation')
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                        <div class="col-6">
                          <label for="application_deadline" class="form-label">Application Deadline</label>
                          <input name="application_deadline" type="date" class="form-control" id="application_deadline" placeholder="application_deadline">
                          @error('application_deadline')
                            <span class="text-danger">{{$message}}</span>
                          @enderror

                        </div>
                        <div class="col-6">
                          <label for="company_logo" class="form-label">Company Logo</label>
                          <input name="company_logo" type="file" class="form-control" id="company_logo" placeholder="application_deadline">
                          @error('company_logo')
                            <span class="text-danger">{{$message}}</span>
                          @enderror

                        </div>
                        <div class="col-6">
                          <label for="vacancy_count" class="form-label">Vacancy Count</label>
                          <input name="vacancy_count" type="number" class="form-control" id="vacancy_count" placeholder="vacancy_count">
                          @error('vacancy_count')
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                        <div class="col-6">
                          <label for="job_location" class="form-label">Job Location</label>
                          <input name="job_location" type="text" class="form-control" id="job_location" placeholder="job_location">
                          @error('job_location')
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                        <div class="col-md-6">
                          <label for="minimum_salary" class="form-label">Minimum Salary</label>
                          <input name="minimum_salary" placeholder="minimum_salary" type="number" class="form-control" id="minimum_salary">
                          @error('minimum_salary')
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                        <div class="col-md-6">
                          <label for="published_date" class="form-label">Published Date</label>
                          <input name="published_date" placeholder="published_date" type="date" class="form-control" id="published_date">
                          @error('published_date')
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                        <div class="col-md-6">
                          <label for="requirements" class="form-label">Requirements</label>
                          <input name="requirements" placeholder="requirements" type="text" class="form-control" id="requirements">
                          @error('requirements')
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="education" class="form-label">Education</label>
                            <input name="education" placeholder="education" type="text" class="form-control"
                                id="education">
                            @error('education')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="experience" class="form-label">Experience</label>
                            <input name="experience" placeholder="experience" type="text" class="form-control"
                                id="experience">
                            @error('experience')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                          <label for="responsibilities" class="form-label">Responsibilities</label>
                          <input name="responsibilities" placeholder="responsibilities" type="text" class="form-control" id="responsibilities">
                          @error('responsibilities')
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                        <div class="col-md-6">
                          <label for="benefits" class="form-label">Benefits</label>
                          <input name="benefits" placeholder="benefits" type="text" class="form-control" id="benefits">
                          @error('benefits')
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                        <div class="col-md-6">
                          <label for="employment_status" class="form-label">Employment Status</label>
                          <input name="employment_status" placeholder="employment_status" type="text" class="form-control" id="employment_status">
                          @error('employment_status')
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                        {{-- <div class="col-md-4">
                          <label for="inputState" class="form-label">State</label>
                          <select id="inputState" class="form-select">
                            <option selected>Choose...</option>
                            <option>...</option>
                          </select>
                        </div>
                        <div class="col-md-2">
                          <label for="inputZip" class="form-label">Zip</label>
                          <input type="text" class="form-control" id="inputZip">
                        </div> --}}
                        <div class="col-12">
                          <button id="liveToastBtn" type="submit" class="btn btn-primary">Create job</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
  @else 
   <div>
    <p>Unautorized Access</p>
   </div>
  @endif
    
    
</section>

@endsection
