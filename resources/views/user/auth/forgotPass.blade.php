@extends('layouts.login')

@section('content')

<section class="flexbox-container">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
                <div class="card border-grey border-lighten-3 m-0">
                    <div class="card-header border-0">
                        <div class="card-title text-center">
                            <div class="p-1">
                                <img src="{{asset('assets/admin/images/logo/logo.png')}}" alt="LOGO"/>

                            </div>
                        </div>
                        <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                            <span> اعادة ضبط كلمة المرور </span>
                        </h6>
                    </div>

                        @include('admin.includes.alerts.errors')
                        @include('admin.includes.alerts.success')

                    <div class="card-content">
                        <div class="card-body">
                            <form class="form-horizontal form-simple" action="{{route('resetPass')}}" method="post"
                                novalidate>
                                @csrf {{-- تشفير الفورم --}}
                                <fieldset class="form-group position-relative has-icon-left mb-0">
                                    <input type="email" name="email" class="form-control form-control-lg input-lg"
                                        value="{{old('email')}}" id="email" placeholder="أدخل البريد الالكتروني ">
                                    <div class="form-control-position">
                                        <i class="ft-user"></i>
                                    </div>
                                    @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror

                                </fieldset>

                                <br>


                                <button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i>
                                    دخول
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
