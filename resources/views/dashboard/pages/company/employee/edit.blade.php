@extends('dashboard.layout.app')

@section('main_content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                {{-- Error Message Start --}}
                @if (Session::has('fail'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('fail') }}
                </div>
                @endif

                {{-- Success Message Start --}}
                @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
                @endif
                
                <div class="company-inner card mt-5">
                    <h1 class="text-center pt-4 pb-4 border-bottom">Employee Info Update</h1>
                    <div class="col-md-6">
                            <label for="company_role" class="form-label">Employee Name</label>
                            <p> {{$emplEdit->name}}</p>
                    </div>
                    <form action="{{route('company-employee.update',$emplEdit->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- company_role --}}
                        <div class="col-md-6">
                            <label for="company_role" class="form-label">company_role</label>
                            <select name="company_role" id="company_role" class="form-select">
                              <option value="2">Editor</option>
                              <option value="1">Manager</option>
                            </select>
                          </div>
                        <div class="col-12">
                            <button id="liveToastBtn" type="submit" class="btn btn-primary">Update Job</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection