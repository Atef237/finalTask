@extends('layouts.user')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">



                @isset($users)
                    @foreach($users as $user)
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $user -> name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $user -> email }}</h6>
                                <a href="{{route('sendRequest',$user->id)}}" class="card-link">send request</a>
                            </div>
                        </div>
                    @endforeach
                @endisset


        </div>
    </div>
@endsection
