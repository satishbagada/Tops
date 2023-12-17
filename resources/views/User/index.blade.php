@extends('Layouts.mainLayout')
@section('content')
    <div class="content-wrapper">
        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title">User</h4>
                                <p class="card-description">
                                    User List
                                </p>
                            </div>
                            <div>
                                <a href="/User/Create" class=" fw-bold  btn btn-info btn-sm">Add</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped datatable">
                                <thead>
                                    <tr>
                                        <th>Sr#</th>
                                        <th>Profile</th>
                                        <th>First name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('afterScript')
    <script>
        $(document).ready(function() {
            $(".datatable").DataTable({
                processing: true,
                serverSide: true,
                // "fnRowCallback": function(nRow, aData, iDisplayIndex) {
                //     $("td:first", nRow).html(iDisplayIndex + 1);
                //     return nRow;
                // },
                "pageLength" : 5,
                "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
                "order": [
                    [0, 'desc']
                ],
                ajax: "{{ route('User.index') }}",
                columns: [
                    {
                        data: 'id',
                        render: function(data, type, row, meta) {
                            return meta.row + 1;
                        }
                    },
                    {
                        "data": "user_profile",
                        "mRender": function(data) {
                            return '<img src="/assets/images/' + data + '" >';
                        }
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'type',
                        name: 'type'
                    },
                    {
                        "mRender": function(data, type, full) 
                        {
                            if (full.user_status == 0) 
                            {
                                return "<button class='btn activeuser' title='Deactive' data-id='" +
                                    full.id +"'><i class='bi bi-check-circle text-success'></i></button>";
                            } else 
                            {
                                return "<button class='btn activeuser' title='Active' data-id='" +full.id +"'><i class='bi bi-x-circle text-danger'></i></button>";
                            }
                        }
                    }
                ]

            });


        });


        // ============================Active User=============================//
        $("body").delegate(".activeuser", "click", function() {
            let id = $(this).data('id');


            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });


            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        type: "get",
                        url: "/User/Active/" + id,
                        success: function(data) {
                            let status = data.status;
                            if (status === 200) {
                                console.log(status);
                                Swal.fire({
                                    title: "Deactivate!",
                                    text: data.message,
                                    icon: "success"
                                }).then(() => {
                                    $('.datatable').DataTable().ajax.reload(null,
                                        false);
                                });;

                                // $('.datatable').DataTable().destroy();
                            } else {
                                Swal.fire({
                                    text: data.message,
                                    icon: "error"
                                });
                            }
                        }
                    })

                }
            });


        });
    </script>
@endsection
