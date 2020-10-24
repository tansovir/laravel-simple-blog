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
            @if(Session::has('add-message'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    {{Session::get('add-message')}}
                </div>
            @endif
            @error('title')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    {{$message}}
                </div>
            @enderror
            @error('body')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    {{$message}}
                </div>
            @enderror
            <div id="accordianId" role="tablist" aria-multiselectable="true">
                <div class="card mb-2">
                    <div class="card-header" role="tab" id="section1HeaderId">
                        <h5 class="mb-0 text-right">
                            <a data-toggle="collapse" data-parent="#accordianId" href="#section1ContentId" aria-expanded="true" aria-controls="section1ContentId">
                            Post your blog <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                        </h5>
                    </div>
                    <div id="section1ContentId" class="collapse in" role="tabpanel" aria-labelledby="section1HeaderId">
                        <div class="card-body">
                            <form method="post" action="{{route('add.post')}}">
                                @csrf
                                <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                <label for="Body">Body</label>
                                <textarea class="form-control" name="body" id="body" rows="7"></textarea>
                                </div>
                                <button type="submit" class="btn mb-3 float-right btn-primary ml-2">Post</button>
                                <a class="btn btn-danger float-right" data-toggle="collapse" data-parent="#accordianId" href="#section1ContentId" aria-expanded="true" aria-controls="section1ContentId">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
                @if(Session::has('deleteMessage'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    {{Session::get('deleteMessage')}}
                </div>
                @endif
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($postsData as $post)
                        <tr>
                            <td>{{ Str::limit($post->title, 20) }}</td>
                            <td>{{ Str::limit($post->body, 40) }}</td>
                            <td>
                                <a href="{{url('/posts/view/'. $post->id)}}" class="btn btn-sm btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a href="{{url('/posts/delete/'. $post->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                <a href="{{url('/view/edit/'. $post->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <div class="col-lg-4 col-md-8">
            <x-sidebar />
        </div>
    </div>
</div>
@endsection