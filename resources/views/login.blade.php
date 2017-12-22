@extends('partials.layout-login')

@section('css')
    <link rel="stylesheet" href="/css/login.css" type="text/css">
@endsection

@section('content')
    <div class="image-container set-full-height"
         style="background-image: url('http://hdwallpaper2013.com/wp-content/uploads/2013/01/Vintage-Tree-Nature-Background-HD-Wallpaper.jpg')">
        <!--  Made With Material Kit  -->
        <a href="https://www.facebook.com/donaldtrung.hcmus" class="made-with-mk" target="_blank">
            <div class="brand">DN</div>
            <div class="made-with">I am <strong>Donald Trung</strong></div>
        </a>

        <!--   Big container   -->
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="wizard-container">
                        <div class="card wizard-card" data-color="red" id="wizard">
                            <form>
                                {!! csrf_field() !!}
                                <div class="wizard-header">
                                    <h3 class="wizard-title">
                                        Book a Room
                                    </h3>
                                    <h5>This information will let us know more about you.</h5>
                                </div>
                                <div class="wizard-navigation">
                                    <ul>
                                        <li><a href="#login" data-toggle="tab">Login</a></li>
                                        <li><a href="#register" data-toggle="tab">Register</a></li>
                                    </ul>
                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane" id="login">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4 class="info-text"> Let's start with the basic details.</h4>
                                            </div>
                                            <div class="col-sm-offset-3 col-sm-6">
                                                <a href="/social/facebook" class="btn btn-block btn-social btn-twitter"
                                                   style="background-color: #478">
                                                    <span class="fa fa-facebook"></span> Login with Facebook
                                                </a>
                                            </div>
                                            <div class="col-sm-offset-3 col-sm-6">
                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">email</i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Your Email</label>
                                                        <input id="emailLogin" type="text" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">lock_outline</i>
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Your Password</label>
                                                        <input id="passwordLogin" type="password" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="register">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4 class="info-text"> Let's start with the basic details.</h4>
                                            </div>
                                            <div class="col-sm-offset-3 col-sm-6">
                                                <a href="/social/facebook" class="btn btn-block btn-social btn-twitter"
                                                   style="background-color: #478">
                                                    <span class="fa fa-facebook"></span> Register with Facebook
                                                </a>
                                            </div>
                                            <div class="col-sm-offset-3 col-sm-6">
                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">email</i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Your Email</label>
                                                        <input id="emailRegister" type="text" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">lock_outline</i>
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Your Password</label>
                                                        <input id="passwordRegister" type="password"
                                                               class="form-control">
                                                    </div>
                                                </div>

                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">lock_outline</i>
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Confirm Password</label>
                                                        <input id="cfpasswordRegister" type="password"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="wizard-footer">
                                        <div class="pull-right">
                                            <input type='button' class='btn btn-login btn-fill btn-danger btn-wd'
                                                   value='Login'/>
                                            <input type='button' class='btn btn-register btn-fill btn-danger btn-wd'
                                                   value='Register'/>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> <!-- wizard container -->
                </div>
            </div> <!-- row -->
        </div> <!--  big container -->

        <div class="footer">
            <div class="container text-center">
                Made with <i class="fa fa-heart heart"></i> by <a href="https://www.facebook.com/donaldtrung.hcmus"
                                                                  target="_blank">DN</a>.
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="/js/styles.js"></script>
    <script src="/js/loginBase.js"></script>
    <script src="/js/login.js"></script>
@endsection
