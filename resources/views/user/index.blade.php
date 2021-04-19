@extends('layouts.user')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">

            <a class="btn btn-outline-primary" href="{{route('Post')}}" role="button">{{__('admin/index.addPost')}}</a>
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


           @isset($post)

                   <div class="card" style="width: 18rem;">
                       <div class="card-body">
                           <h5 class="card-title">{{$post->title}}</h5>
                           <h6 class="card-subtitle mb-2 text-muted">{{$post->user->name}}</h6>
                           <p class="card-text">{{$post->text}}</p>
                           <h6 class="card-subtitle mb-2 text-muted">
                               @isset($comments) comments: {{$comments->count()}}  @endisset
                               @isset($likes) -- Likes: {{$likes->count()}} @endisset
                           </h6>
                       </div>
                   </div>

                   @isset($comments)
                       @foreach($comments as $comment)
                           <div class="card" style="width: 18rem;">
                               <div class="card-body">
                                   <h5 class="card-title"> Comment by: {{$comment->user->name}}</h5>
                                   <p class="card-text">{{$comment -> text}}</p>
                               </div>
                           </div>

                       @endforeach

                   @endisset

                   <form class="form-horizontal form-simple" action="{{route('postComment')}}" method="post"
                         novalidate>
                       @csrf {{-- تشفير الفورم --}}
                       <fieldset class="form-group position-relative has-icon-left mb-0">
                           <textarea  name="comment" class="form-control form-control-lg input-lg">
                               </textarea>

                       </fieldset>

                       <input type="hidden" value=" {{$post->id}}" name="post_id">
                       <input type="hidden" value="1" name="user_id">

                       <button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i>
                           comment
                       </button>
                   </form>




               @endisset

        </div>
    </div>
@endsection
