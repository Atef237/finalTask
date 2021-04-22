@extends('layouts.user')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">



                @if( $friends->count() > 0 )
                    @foreach($friends as $friend)
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $friend -> name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $friend -> email }}</h6>
                                <a href="{{route('accept_request',$friend->id)}}" class="card-link">accept request</a>
                            </div>
                        </div>
                    @endforeach
                @endisset


        </div>
    </div>
@endsection
