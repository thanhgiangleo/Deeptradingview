@extends('partials.layout')

@section('css')
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">User Information</h4>
                        </div>
                        <div class="content">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                    <input id="email" type="text" class="form-control" disabled
                                           value={{ $user->email }}>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type_user">Type</label>
                                        <select class="form-control" id="type_user" disabled>
                                            <option <?php if($user->type == 0) echo "selected" ?> value="0">Guest</option>
                                            <option <?php if($user->type == 0) echo "selected" ?> value="1">User</option>
                                            <option <?php if($user->type == 0) echo "selected" ?> value="2">Mod</option>
                                            <option <?php if($user->type == 0) echo "selected" ?> value="3">Admin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Payment Code</label>
                                    <input id="payment_code" type="text" class="form-control" disabled
                                           value={{ $user->payment_code }}>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Reffer Code</label>
                                    <input id="preffer_code" type="text" class="form-control" disabled
                                           value={{ $user->reffered_code }}>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status_user">Status</label>
                                        <select class="form-control" id="status_user" disabled>
                                            <option <?php if($user->status == 0) echo "selected" ?> value="0">Active</option>
                                            <option <?php if($user->status == 0) echo "selected" ?> value="1">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Expired At</label>
                                    <input id="expired_at" type="text" class="form-control" disabled
                                           value={{ $user->expired_at }}>
                                </div>
                            </div>

                            {{--//--}}
                            {{--<div class="row">--}}
                            {{--<div class="col-md-5">--}}
                            {{--<div class="form-group">--}}
                            {{--<label>Company (disabled)</label>--}}
                            {{--<input type="text" class="form-control" disabled--}}
                            {{--placeholder="Company" value="Creative Code Inc.">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                            {{--<div class="form-group">--}}
                            {{--<label>Username</label>--}}
                            {{--<input type="text" class="form-control" placeholder="Username"--}}
                            {{--value="michael23">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-4">--}}
                            {{--<div class="form-group">--}}
                            {{--<label for="exampleInputEmail1">Email address</label>--}}
                            {{--<input type="email" class="form-control" placeholder="Email">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="row">--}}
                            {{--<div class="col-md-6">--}}
                            {{--<div class="form-group">--}}
                            {{--<label>First Name</label>--}}
                            {{--<input type="text" class="form-control" placeholder="Company"--}}
                            {{--value="Mike">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-6">--}}
                            {{--<div class="form-group">--}}
                            {{--<label>Last Name</label>--}}
                            {{--<input type="text" class="form-control" placeholder="Last Name"--}}
                            {{--value="Andrew">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="row">--}}
                            {{--<div class="col-md-12">--}}
                            {{--<div class="form-group">--}}
                            {{--<label>Address</label>--}}
                            {{--<input type="text" class="form-control" placeholder="Home Address"--}}
                            {{--value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="row">--}}
                            {{--<div class="col-md-4">--}}
                            {{--<div class="form-group">--}}
                            {{--<label>City</label>--}}
                            {{--<input type="text" class="form-control" placeholder="City"--}}
                            {{--value="Mike">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-4">--}}
                            {{--<div class="form-group">--}}
                            {{--<label>Country</label>--}}
                            {{--<input type="text" class="form-control" placeholder="Country"--}}
                            {{--value="Andrew">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-4">--}}
                            {{--<div class="form-group">--}}
                            {{--<label>Postal Code</label>--}}
                            {{--<input type="number" class="form-control" placeholder="ZIP Code">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="row">--}}
                            {{--<div class="col-md-12">--}}
                            {{--<div class="form-group">--}}
                            {{--<label>About Me</label>--}}
                            {{--<textarea rows="5" class="form-control"--}}
                            {{--placeholder="Here can be your description" value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            {{--<button id="update-profile-button" class="btn btn-info btn-fill pull-right">Update Profile--}}
                            {{--</button>--}}
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-user">
                        <div class="image">
                            <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400"
                                 alt="..."/>
                        </div>
                        <div class="content">
                            <div class="author">
                                <a href="#">
                                    <img class="avatar border-gray" src="assetsadmin/img/faces/face-3.jpg"
                                         alt="..."/>

                                    <h4 class="title">Mike Andrew<br/>
                                        <small>michael24</small>
                                    </h4>
                                </a>
                            </div>
                            <p class="description text-center"> "Lamborghini Mercy <br>
                                Your chick she so thirsty <br>
                                I'm in that two seat Lambo"
                            </p>
                        </div>
                        <hr>
                        <div class="text-center">
                            <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i>
                            </button>
                            <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                            <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i>
                            </button>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script language="javascript" src="../js/index.js"></script>
    <script language="javascript" src="../js/coin-charts.js"></script>
    <script language="javascript" src="https://code.highcharts.com/highcharts.js"></script>
    <script language="javascript" src="https://code.highcharts.com/modules/exporting.js"></script>
    <script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script language="javascript" src="https://s3.tradingview.com/tv.js"></script>
@endsection
