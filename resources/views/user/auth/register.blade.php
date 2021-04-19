@extends('layouts.login')

@section('content')

<section class="flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-md-4 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0 pb-0">
                    <div class="card-title text-center">
                        <img src="{{asset('assets/admin/images/logo/logo.png')}}" alt="LOGO"/>
                    </div>
                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                        <span>Please Sign Up</span>
                    </h6>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form-horizontal" action="{{route('PostRegister')}}" method="post" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-6">
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="text" name="first_name" id="first_name" class="form-control input-lg"
                                               placeholder="First Name" tabindex="1">
                                        <div class="form-control-position">
                                            <i class="ft-user"></i>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6">
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="text" name="last_name" id="last_name" class="form-control input-lg"
                                               placeholder="Last Name" tabindex="2">
                                        <div class="form-control-position">
                                            <i class="ft-user"></i>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address"
                                       tabindex="4" required data-validation-required-message="Please enter email address.">
                                <div class="form-control-position">
                                    <i class="ft-mail"></i>
                                </div>
                                <div class="help-block font-small-3"></div>
                            </fieldset>
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-6">
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="password" name="password" id="password" class="form-control input-lg"
                                               placeholder="Password" tabindex="5" required>
                                        <div class="form-control-position">
                                            <i class="la la-key"></i>
                                        </div>
                                        <div class="help-block font-small-3"></div>
                                    </fieldset>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6">
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="password" name="password" id="password_confirmation" class="form-control input-lg"
                                               placeholder="Confirm Password" tabindex="6" data-validation-matches-match="password"
                                               data-validation-matches-message="Password & Confirm Password must be the same.">
                                        <div class="form-control-position">
                                            <i class="la la-key"></i>
                                        </div>
                                        <div class="help-block font-small-3"></div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" col-sm-6">
                                    <button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-user"></i> Register</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
