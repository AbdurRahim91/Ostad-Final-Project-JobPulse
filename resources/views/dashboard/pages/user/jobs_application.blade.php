@extends('dashboard.layout.app')

@section('main_content')   
<div class="main-content m-0">

<div class="page-content m-0">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title">Jobs List <span class="text-muted fw-normal ms-2"></span></h5>
                </div>
            </div>

            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                    <div>
                        <!-- <a href="#" class="btn btn-primary"><i class="bx bx-plus me-1"></i> Add New</a> -->
                    </div>
                </div>

            </div>
        </div>
        <!-- end row -->

        <div class="table-responsive mb-4">
            <table id="categoryTable" class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                <thead>
                  <tr>
                    <th scope="col" style="width: 5%;">Sl</th>
                    <th scope="col" style="width: 70%; min-width: 80px;">Organization Name</th>
                    <th style="width: 25%; min-width: 80px;">Post</th>
                    <th style="width: 25%; min-width: 80px;">Status</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($job_details as $job)
                    <tr id="tr_{{ $job->id }}">
                        <td>
                           {{ $job->id }}
                        </td>
                        <td>
                           {{ $job->organization_name }}
                        </td>
                        <td>
                          {{ $job->designation }}
                        </td>
                        <td>
                       
                            @if($job->status==1)
                                {{ 'Pending' }}
                            @elseif($job->status==2)
                                {{ 'Viewed By Company' }}
                            @elseif($job->status==3)
                                {{ 'You are Selected' }}
                            @elseif($job->status==4)
                                {{ 'You are rejected' }}
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- end table -->
        </div>
        <!-- end table responsive -->
        
    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
</div>

@endsection
