@extends('partials.layout')

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
                    <!-- Wizard container -->
                    <div class="wizard-container">
                        <div class="card wizard-card" data-color="red" id="wizard">
                            <form action="" method="">
                                <div class="wizard-header">
                                    <h3 class="wizard-title">
                                        DEEP TRADING VIEW
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
                                                <a href="/social/facebook" class="btn btn-block btn-social btn-twitter" style="background-color: #478">
                                                    <span class="fa fa-facebook"></span> Sign in with Facebook
                                                </a>
                                            </div>

                                            <div class="col-sm-offset-3 col-sm-6">
                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">email</i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Your Email</label>
                                                        <input name="name" type="text" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">lock_outline</i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Your Password</label>
                                                        <input name="name2" type="password" class="form-control">
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
                                                <a href="/social/facebook" class="btn btn-block btn-social btn-twitter" style="background-color: #478">
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
                                                        <input name="name" type="text" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">lock_outline</i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Your Password</label>
                                                        <input name="name2" type="password" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">lock_outline</i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Confirm Password</label>
                                                        <input name="name2" type="password" class="form-control">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <input type='button' class='btn btn-next btn-fill btn-danger btn-wd' name='next'
                                               value='Login'/>
                                        <input type='button' class='btn btn-finish btn-fill btn-danger btn-wd'
                                               name='finish' value='Register'/>
                                    </div>
                                    <div class="clearfix"></div>
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