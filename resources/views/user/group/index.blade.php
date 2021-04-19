@extends('layouts.user')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">

            @isset($groups)
                @foreach($groups as $group)


                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h1 class="card-title">{{$group -> group_name}}</h1>

                            <a href="{{route('join',$group->id)}}" class="card-link">{{__('admin/index.Join')}}</a>

                        </div>
                    </div>

                @endforeach
            @endisset




        </div>
    </div>
@endsection
