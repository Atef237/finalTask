@extends('layouts.user')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">



               @foreach($friends as $friend)
                    <div class="card" style="width: 18rem;">
                        <div class="card-body  ">

                            @if($friend->count() > 0)
                                <h5 class="card-title  "> @if($users[1] -> id == $friend -> sender_id)  @endif </h5>
                            @endif

                        </div>
                    </div>
                @endforeach




        </div>
    </div>
@endsection
