@extends('Layouts.mainLayout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title ">Register</h4>
                                <p class="card-description">
                                    Table/User/Register
                                </p>
                            </div>
                            <div>
                                <a href="/User/index" class=" btn btn-info btn-sm">Back</a>
                            </div>

                        </div>
                        <form class="forms-sample" id="register-form" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label for="user_name">Username</label>
                                        <input type="text" class="form-control" id="user_name" placeholder="Username"
                                            name="user_name">
                                        <span class="text-danger user_name_err"></span>

                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="Email" name="user_email">
                                        <span class="text-danger user_email_err"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1"
                                            placeholder="Password" name="password">
                                        <span class="text-danger password_err"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label for="exampleInputConfirmPassword2">Confirm Password</label>
                                        <input type="password" class="form-control" id="exampleInputConfirmPassword1"
                                            placeholder="Confirm Password" name="password_confirmation">
                                        <span class="text-danger password_confirmation_err"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <label for="exampleInputConfirmPassword1">Profile</label>
                                    <input type="file" class="form-control" name="user_profile" id="user_profile"
                                        class="user_profile" accept="image/*">
                                    <span class="text-danger user_profile_err"></span>
                                </div>


                                <div class="col-md-6 col-lg-3 preview" style="display: none">
                                    <div class="form-group">
                                        <img src="" alt="not found" class="rounded-circle border" width="120px"
                                            height="120px" id="preview">
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label for="exampleInputConfirmPassword1">Status</label>
                                        <select name="user_type" id="user_type" class="form-control">
                                            <option value="0">Admin</option>
                                            <option value="1">Manager</option>
                                            <option value="2">User</option>
                                        </select>
                                        <span class="text-danger user_type_err"></span>
                                    </div>
                                </div>


                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                        <button class="btn btn-light">Cancel</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check form-check-flat form-check-primary">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">
                                    Remember me
                                </label>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('css')
    <style>
        #preview {
            background-size: cover;
            background-position: center;
        }
    </style>
@endsection
@section('afterScript')
<script src="{{asset('assets/resources/UserFunction.js')}}"></script>
    <script>
        
        $("body").change(".user_profile", function() {

            const [file] = user_profile.files
            if (file) {
                if (file.type == 'image/png' || file.type == 'image/jpg' || file.type == 'image/jpeg') {
                    preview.src = URL.createObjectURL(file)
                    $(".preview").show("2000");
                } else {
                    Swal.fire({
                        text: 'only allow png jpg and jpeg extension',
                        icon: "warning"
                    }).then(()=>{
                        $(".preview").hide("2000");
                        return false;
                    });
                        
                }
            }
        })
        // ===========submit form========================//
        $("#register-form").submit(function(e) {
            e.preventDefault();
            let form = new FormData(this);
            // form.append('user_profile', $('#user_profile')[0].files[0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "/User/Create",
                type: "POST",
                data: form,
                contentType: false,
                processData: false,
                success: function(res) {
                    if ($.isEmptyObject(res.error)) {

                        if (res.status === 200) {
                            loadMessage(res.message);
                            $('#register-form')[0].reset();
                        } else if (res.status == 403) {
                            Swal.fire({
                                text: res.message,
                                icon: "error"
                            });
                        } else {
                            alert("There is some error");
                        }
                    } else {
                        $(".user_name_err").text('');
                        $(".user_email_err").text('');
                        $(".password_err").text('');
                        $(".password_confirmation_err").text('');
                        $(".user_type_err").text('');
                        $(".user_profile_err").text('');
                        $.each(res.error, function(key, value) {
                            $('.' + key + '_err').text(value);
                        });
                    }


                }
            })
        });

       
    </script>
@endsection
