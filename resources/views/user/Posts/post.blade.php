@extends('layouts.user')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">

            <form class="form-horizontal form-simple" action="{{route('addPost')}}" method="post"
                  novalidate>
                @csrf {{-- تشفير الفورم --}}
                <fieldset class="form-group position-relative has-icon-left mb-0">
                        <input name="title" class="form-control form-control-lg input-lg" placeholder="Inter Title">
                </fieldset>

                <br>
                <br>
                <br>

                <input type="hidden" value=1 name="user_id">

                <fieldset class="form-group position-relative has-icon-left mb-0">
                    <textarea  name="text" class="form-control form-control-lg input-lg" placeholder="Inter Content"></textarea>

                </fieldset>



                <button type="submit" class="btn btn-info btn-lg btn-block">
                    Post
                </button>
            </form>



        </div>
    </div>
@endsection
