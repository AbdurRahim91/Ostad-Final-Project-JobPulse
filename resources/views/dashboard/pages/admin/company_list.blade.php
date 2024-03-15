@extends('dashboard.layout.app')

@section('main_content')   
<div class="main-content m-0">

<div class="page-content m-0">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <!-- <h5 class="card-title">Company List <span class="text-muted fw-normal ms-2">(834)</span></h5> -->
                    <h5 class="card-title">Company List</h5>
                </div>
            </div>

            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                    <div>
                        <a href="#" class="btn btn-light"><i class="bx bx-plus me-1"></i> Add New</a>
                    </div>
                </div>

            </div>
        </div>
        <!-- end row -->

        <div class="table-responsive mb-4">
            <table class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                <thead>
                  <tr>
                    <th scope="col" style="width: 5%;">Sl</th>
                    <th scope="col" style="width: 70%; min-width: 80px;">Company Name</th>
                    <th style="width: 25%; min-width: 80px;">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($companylist as $cl)
                    <tr>
                        <td>
                           {{  $cl->id }}
                        </td>
                        <td>
                           {{  $cl->company_name }}
                        </td>
                        <td>
                            Edit
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
<!-- end main content-->


@endsection
