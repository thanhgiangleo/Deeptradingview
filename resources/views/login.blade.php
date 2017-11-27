@extends('partials.layout')

@section('content')

    <body class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="box">
                <div class="input-group">
					<span class="input-group-addon addon-facebook">
						<i class="fa fa-fw fa-2x fa-facebook fa-fw"></i>
					</span>
                    <a class="btn btn-lg btn-block btn-facebook" href="/social/facebook"> Register with Facebook</a>
                </div>

                <form role="form">

                    <div class="divider-form"></div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    </div>

                    <div class="divider-form"></div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>

                    <div class="divider-form"></div>

                    <button type="submit" class="btn-block btn btn-lg btn-primary">Login</button>

                    <p class="text-center">Already have an account? <a href="#">Register here</a></p>
                </form>
            </div>
        </div>
    </div>
    </body>
@endsection