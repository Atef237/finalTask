@extends('layouts.admin')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">

            @isset($posts)
                @foreach($posts as $postt)



                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$postt -> user->name}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{$postt -> user->email}}</h6>
                            <p class="card-text">{{$postt -> text}}</p>
                            <h6 class="card-subtitle mb-2 text-muted"> comments: {{ $comments->count() }} -- likes: {{ $likes->count()}} </h6>
                            <a href="{{route('addComment',$postt->id)}}" class="card-link">{{__('admin/index.comment')}}</a>
                            <a href="{{route('addLike',$postt->id)}}" class="card-link">{{__('admin/index.like')}}</a>

                        </div>
                    </div>

                @endforeach
            @endisset




        </div>
    </div>
@endsection
