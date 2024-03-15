@extends('dashboard.layout.app')

@section('main_content')
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title">Company Details</h5>
                </div>
            </div>

            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                    <div>
                        <a href="company-profile/create" class="btn btn-primary"><i class="bx bx-plus me-1"></i> Add New</a>
                    </div>
                </div>

            </div>
        </div>
        <!-- end row -->

        <div class="table-responsive mb-4">
            <table id="nameTable" class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                <thead>
                      <tr class="table-active">
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                      </tr>
                </thead>
                <tbody>
                @if ($com_details->isEmpty())
                    <tr>
                        <td class="text-center" colspan="5">No company details found.</td>
                    </tr>
                @else
                    @foreach ($com_details as $details)
                        <tr>
                            <td>{{$details->company_name}}</td>
                            <td>{{$details->company_email}}</td>
                            <td>{{$details->company_contact}}</td>
                            <td>{{$details->company_address}}</td>
                            <td class="d-flex gap-1">
                                <div class="view-btn">
                                    <a href="{{ route('company-profile.show', $details->id) }}" class="btn btn-primary btn-sm">View</a>
                                </div>
                                <div class="edit-btn">
                                    <a href="{{ route('company-profile.edit', $details->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                </div>
                                <div class="delete-btn">
                                    @if (session('delete'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('delete') }}
                                        </div>
                                    @endif
                                    <form action="{{ route('company-profile.destroy', $details->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <!-- end table -->
        </div>
        <!-- end table responsive -->
        
    </div> <!-- container-fluid -->
@endsection
@section('modal_scripts')  

<script>
    $(document).ready(function() {
        new DataTable('#nameTable'); 
    });
</script>

@endsection