@extends('dashboard.layout.app')

@section('main_content')   
<div class="main-content m-0">

<div class="page-content m-0">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title">Category List <span class="text-muted fw-normal ms-2">(834)</span></h5>
                </div>
            </div>

            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                    <div>
                        <a href="#" class="btn btn-primary"><i class="bx bx-plus me-1"></i> Add New</a>
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
                    <th scope="col" style="width: 70%; min-width: 80px;">Job Category</th>
                    <th style="width: 25%; min-width: 80px;">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($jobscategories as $category)
                    <tr id="tr_{{ $category->id }}">
                        <td>
                           {{ $category->id }}
                        </td>
                        <td>
                           {{ $category->category_name }}
                        </td>
                        <td>
                            <button type="button" class="editBtn btn btn-primary btn-sm" value="{{ $category->id }}">Edit</button>
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

<!-- Modal Start -->
<!-- Edit Data Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header" style="background:; color: white;">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="btn-close btn-dark" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateData">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">

                        <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                        <input type="hidden" name="edit_id" id="edit_id" >
                        
                        <div class="mb-3 row">
                            <label for="edit_cat_name" class="col-sm-4 col-form-label">Category Name: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="edit_cat_name" id="edit_cat_name" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="background:; color: white;">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Data</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
@endsection
@section('modal_scripts')  

<script>
    $(document).ready(function() {
        new DataTable('#categoryTable'); 
    });
    $(document).ready(function () {
        $(document).on('click','.editBtn', function () {
            var data_id=$(this).val();
            // alert(cat_id);
            $('#editModal').modal('show');

            $.ajax({
                type:"GET",
                url:'/jobcategories/' + data_id + '/edit',
                success:function (response) {
                    // console.log(response.cat_id.category_name);
                    $('#edit_id').val(response.cat_id.id);
                    $('#edit_cat_name').val(response.cat_id.category_name);
                }
            });
        });

        // Submit form using AJAX
        $('#updateData').submit(function (e) {
            e.preventDefault(); // Prevent default form submission

            var formData = $(this).serialize(); // Serialize form data
            console.log(formData);

            $.ajax({
                type: "PUT", // Use PUT method for updating data
                url: "/jobcategories/" + $('#edit_id').val(), // Update URL based on the category ID
                data: formData, // Form data
                success: function (response) {
                    if (response.status === 200) {
                        
                        $('#editModal').modal('hide');
                        setTimeout(function() {
                            alert('Data updated successfully');
                            location.reload(); // Reload the page after showing the alert
                        }, 1000);
                        // Show success message or perform any other action
                        //$('#editModal').modal('hide'); // Hide modal
                        //$('#updateData')[0].reset();
                        //$('#categoryTable').DataTable().ajax.reload();
                        //location.href = '/admin/job_category_list';
                        //location.reload();
                       // $('#categoryTable').load(location.href + "#categoryTable");
                        //alert('Data updated successfully');

                        
                    } else {
                        // Show error message if update failed
                        $('#errorMessageUpdate').html(response.message).removeClass('d-none');
                    }
                },
                error: function (xhr, status, error) {
                    // Handle AJAX errors
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

@endsection