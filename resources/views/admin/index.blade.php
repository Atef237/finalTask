@extends('layouts.user')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header">

                    <div class="row">
                        @foreach($posts as $post)
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h5 class="card-title">{{$post -> user->name }}</h5>
                                        <p class="card-text">{{$post -> text}}</p>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

            </div>
        </div>
    </div>

@endsection
