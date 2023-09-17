@extends('master')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Muna</h4>

                                <div class="flex-shrink-0">
                                    <div class="form-check form-switch form-switch-right form-switch-md">
                                        <label for="card-tables-showcode" class="form-label text-muted">Show Code</label>
                                        <input class="form-check-input code-switcher" type="checkbox" id="card-tables-showcode">
                                    </div>
                                </div>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div class="live-preview">
                                    <div class="table-responsive table-card">
                                        <table class="table align-middle table-nowrap table-striped-columns mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th scope="col">Student ID</th>
                                                    <th scope="col">first Name</th>
                                                    <th scope="col">Last Name</th>
                                                    <th scope="col">College Name</th>
                                                    <th scope="col">Phone Number </th>
                                                    <th scope="col">email address </th>
                                                    <th scope="col"> address </th>
                                                    <th scope="col">Profile Image </th>
                                                    <th scope="col" style="width: 150px;">Action</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($student as $data)
                                                <tr id="studentRow{{$data->id}}">
                                                    <td>{{$data->student_ID}}</td>
                                                    <td>{{$data->first_name}}</td>
                                                    <td>{{$data->last_name}}</td>
                                                    <td>{{$data->college_name}}</td>
                                                    <td>{{$data->phone_number}}</td>
                                                    <td>{{$data->email_address}}</td>
                                                    <td>{{$data->address}}</td>
                                                    <td>{{$data->featured_image}}</td>
                                                    <td><a href="{{route('editStudent',$data->id)}}"><button  type="button" class="btn btn-sm btn-success">Edit</button></a>
                                                        <button type="button" class="btn btn-sm btn-danger" onclick="deleteStudent({{$data->id}})">Delete</button></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="d-none code-view">
                                </div>
                            </div><!-- end card-body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                </div><!-- end row -->
        </div>
    </div>
    </div>
<script>
    function deleteStudent(student_id) {
        bootbox.confirm({
            title: "Delete student data?",
            message: "Do you want to delete this student data?",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Cancel'
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Confirm'
                }
            },
            callback: function(result) {
                if (result) {
                    const url = "{{route('deleteStudent')}}";
                    $.ajax({
                        url: url,
                        method: "GET",
                        data: {
                            student_id
                        },
                        success: function(responseData) {
                            $('#studentRow' + student_id).remove();
                            toastr.success(responseData.msg);
                        },
                        error: function(responseData) {
                            toastr.error(responseData.msg);
                        }
                    });
                } else {
                    // Do something if the user cancels the deletion
                }
            }
        });
    }
</script>

@endsection
