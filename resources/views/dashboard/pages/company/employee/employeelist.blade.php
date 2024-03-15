@extends('dashboard.layout.app')

@section('main_content')
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title">Company Staffs </h5>
                </div>
            </div>

            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                    <div>
                        <a href="/company-employee/create" class="btn btn-primary"><i class="bx bx-plus me-1"></i> Add New</a>
                    </div>
                </div>

            </div>
        </div>
        <!-- end row -->
        {{-- Success Message Start --}}
        @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
        @endif
        <div class="table-responsive mb-4">
            <table id="nameTable" class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Employee Name</th>
                        <th scope="col">Designation</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Address</th>
                        <th scope="col">Joining Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                           $i= 0;
                    @endphp
                     @foreach ($empl_list as $employeeList)
                     @php
                         $i++;
                     @endphp
                     <tr>
                        <th scope="row">
                            {{$i}}
                        </th>
                        <th scope="row">{{$employeeList->name}}</th>
                        <th scope="row">
                            @if ($employeeList->company_role == 1)
                                {{ 'Manager' }}
                            @else
                                {{ 'Editor' }}
                            @endif
                        </th>
                        <td>{{$employeeList->contact}}</td>
                        <td>{{$employeeList->address}}</td>
                        <td>{{$employeeList->joining_date}}</td>
                        <td class="d-flex gap-1">

                             <div class="edit-btn ">
                             {{-- edit button --}}
                             <a href="{{ route('company-employee.edit', $employeeList->id) }}" class="btn btn-primary btn-sm">Edit</a>

                           </div>

                          <div class="delete-btn">
                            <form action="{{ route('company-employee.destroy', $employeeList->id) }}" method="POST">
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