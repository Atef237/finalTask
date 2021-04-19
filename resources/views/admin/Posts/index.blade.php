@extends('layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">

            <form class="form"
          action="{{route('addPostt')}}"
          method="POST"
          enctype="multipart/form-data">
        @csrf

        <div class="form-body">

            <input type="hidden" name="id" value="{{$request -> id}}">

            <h4 class="form-section"><i class="ft-home"></i> اضافه منشور </h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="projectinput1"> العنوان</label>
                        <input type="text" id="title"
                               class="form-control"
                               name="title">
                        @error("name")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="projectinput1">المنشور </label>
                        <textarea id="text" name="text"
                               class="form-control">
                            </textarea>
                        @error("text")
                        <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row cared">

            </div>
        </div>

        <div class="form-actions">
            <button type="button" class="btn btn-warning mr-1"
                    onclick="history.back();">
                <i class="ft-x"></i> تراجع
            </button>
            <button type="submit" class="btn btn-primary">
                <i class="la la-check-square-o"></i> انشاء
            </button>
        </div>
    </form>

        </div>
    </div>
@endsection
