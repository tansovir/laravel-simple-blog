@extends('welcome')

@section('homeMenu')
    <li class="nav-item active">
        <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
    </li>
@endsection

@section('dashboardMenu')
    <li class="nav-item">
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
            <div class="row">
                
                
                @if(!empty($postsData) && $postsData->count())
                    @foreach($postsData as $post)
                    <div class="col-lg-6 col-sm-12">
                        <div class="card mb-2">
                                <img src="http://placehold.it/460x250/e67e22/ffffff&text=HTML5" class="img-fluid" />
                            <div class="card-body">
                                <div>By <b>Tanvir</b> </div>
                                <time datetime="2014-01-20">January 20th, 2014</time>
                                <h4 class="card-title">{{Str::limit($post->title,50)}}</h4>
                                <p class="card-text">{{Str::limit($post->body,120)}}</p>
                                <a href="{{url('/posts/view/'. $post->id)}}" class="btn float-right btn-warning btn-sm">Read more</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <tr>
                        <td colspan="10">There are no data.</td>
                    </tr>
                @endif
            </div>
            <div class="row">  
                <div class="col-lg-12">
                    {!! $postsData->links() !!}
                </div>
            </div>
            
        </div>
        <div class="col-lg-4 col-md-4">
            <x-sidebar />
        </div>
    </div>
    
</div>
@endsection