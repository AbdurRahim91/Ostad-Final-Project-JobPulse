@extends('dashboard.layout.app')

@section('main_content')

<section>
    <!-- start page title -->
    <div class="row">
            <div class="col-12">
                    <!-- <h4 class="mb-sm-0 font-size-18">Company Dashboard</h4> -->
                <div class="company-table card">
                    <h4 class="text-center p-3 border-bottom">All Jobs List </h4>
                <table class="table" id="jobsTable">
                    <thead>
                      <tr>
                        <th scope="col">Designation</th>
                        <th scope="col">Deadline</th>
                        <th scope="col">Vacancy</th>
                        <th scope="col">Publish Date</th>
                        <th scope="col">Employee Status</th>
                        <th scope="col">Publish Date</th>

                        <th scope="col" class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($jobsLists as $jobList)
                     <tr>
                        <th scope="row">{{$jobList->designation}}</th>
                        <td>{{$jobList->application_deadline}}</td>
                        <td>{{$jobList->vacancy_count}}</td>
                        <td>{{$jobList->application_deadline}}</td>
                        <td>{{$jobList->employment_status}}</td>
                        <td>{{$jobList->published_date}}</td>
                   
                        <td class="d-flex gap-1">
                        <form action="{{route('applicants_list')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <input type="text" name="job_id" value="{{$jobList->id}}" hidden>
                                <input type="text" name="company_id" value="{{$jobList->company_id}}" hidden>
                            <div class="view-btn">
                               {{-- view button --}}
                            <button type="submit" class="btn btn-primary btn-sm">Applicants List</a>
                            </div>
                        </form>
                            <div class="view-btn">
                               {{-- view button --}}
                            <a href="{{ route('company/single_job', $jobList->id) }}" class="btn btn-primary btn-sm">View</a>
                           </div>

                             <div class="edit-btn">
                             {{-- edit button --}}
                            <a href="{{ route('company.edit', $jobList->id) }}" class="btn btn-primary btn-sm">Edit</a>

                           </div>

                          <div class="delete-btn">
                            {{-- delete button --}}
                            <form action="{{ route('company.destroy', $jobList->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                          </form>

                          </div>
                        </td>
                      </tr>
                     @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
</section>

@endsection
@section('modal_scripts')  

<script>
    $(document).ready(function() {
        new DataTable('#jobsTable'); 
    });
</script>

@endsection