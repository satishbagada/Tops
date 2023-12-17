@extends('Layouts.mainLayout')
@section('content')
    <div class="content-wrapper">
        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title">Category</h4>
                                <p class="card-description">
                                    Category List
                                </p>
                            </div>
                            <div>
                                <button data-bs-toggle="modal" data-bs-target="#add-category-modal"  class=" fw-bold  btn btn-info btn-sm">Add</a>
                            </div>
                        </div>
                        
                            <form>
                                <div class="row">
                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label for="to_date" style="font-size:16px;">To Date</label>
                                        <input type="date" name="to_date" id="to_date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label for="from_date" style="font-size:16px;">From Date</label>
                                        <input type="date" name="from_date" id="from_date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label for="cat_status" style="font-size:16px;">Status</label>
                                        <select name="cat_status" id="cat_status" class="form-control">
                                            <option value="0">Active</option>
                                            <option value="-1">Deactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-1 gx-0 p-0">
                                    <div class="form-group">
                                        <input type="submit" name="category-filter" class="btn btn-success btn mt-4 ">
                                    </div>
                                </div>
                            </div>
                            </form>
                        

                        <div class="table-responsive">
                            <table class="table table-striped datatable">
                                <thead>
                                    <tr>
                                        <th>Sr#</th>
                                        <th>Logo</th>
                                        <th>Name</th>
                                        <th>Created Date</th>
                                        <th>Status</th>
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
        @include('Items.Category.Add')
@endsection
@section('afterScript')
    <script>
        // $(document).ready(function() {
        //     $(".datatable").DataTable({
        //         processing: true,
        //         serverSide: true,
        //         // "fnRowCallback": function(nRow, aData, iDisplayIndex) {
        //         //     $("td:first", nRow).html(iDisplayIndex + 1);
        //         //     return nRow;
        //         // },
        //         "order": [
        //             [0, 'desc']
        //         ],
        //         ajax: "{{ route('User.index') }}",
        //         columns: [
        //             {
        //                 data: 'id',
        //                 render: function(data, type, row, meta) {
        //                     return meta.row + 1;
        //                 }
        //             },
        //             {
        //                 "data": "user_profile",
        //                 "mRender": function(data) {
        //                     return '<img src="/assets/images/' + data + '" >';
        //                 }
        //             },
        //             {
        //                 data: 'name',
        //                 name: 'name'
        //             },
        //             {
        //                 data: 'email',
        //                 name: 'email'
        //             },
        //             {
        //                 data: 'type',
        //                 name: 'type'
        //             },
        //             {
        //                 "mRender": function(data, type, full) 
        //                 {
        //                     if (full.user_status == 0) 
        //                     {
        //                         return "<button class='btn activeuser' title='Deactive' data-id='" +
        //                             full.id +"'><i class='bi bi-check-circle text-success'></i></button>";
        //                     } else 
        //                     {
        //                         return "<button class='btn activeuser' title='Active' data-id='" +full.id +"'><i class='bi bi-x-circle text-danger'></i></button>";
        //                     }
        //                 }
        //             }
        //         ]

        //     });


        // });


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
