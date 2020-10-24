@extends('welcome')

@section('homeMenu')
    <li class="nav-item">
        <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
    </li>
@endsection

@section('dashboardMenu')
    <li class="nav-item active">
        <a class="nav-link" href="{{url('/dashboard')}}">Dashboard</a>
    </li>
@endsection

@section('profileMenu')
    <li class="nav-item">
        <a class="nav-link" href="{{url('/profile')}}">Profile</a>
    </li>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8">
            <div id="accordianId" role="tablist" aria-multiselectable="true">
                <div class="card mb-2">
                    <div class="card-body">
                        <form method="post" action="{{url('/posts/edit/' . $viewEditPostID->id)}}">
                            @csrf
                            <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" value="{{$viewEditPostID->title}}" name="title" id="title" class="form-control" placeholder="" aria-describedby="helpId">
                            <small id="helpId" class="text-muted"></small>
                            </div>
                            <div class="form-group">
                            <label for="Body">Body</label>
                            <textarea class="form-control" name="body" id="body" rows="7">{{$viewEditPostID->body}}</textarea>
                            </div>
                            <button type="submit" class="btn mb-3 float-right btn-primary ml-2">Update Post</button>
                            <a href="{{url('/cancel/update')}}" class="btn btn-danger float-right">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-4 col-md-8">
            <x-sidebar />
        </div>
    </div>
</div>
@endsection