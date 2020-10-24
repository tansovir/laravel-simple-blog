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
                
               
                <div class="col-12">
                @if(Session::has('comments-done'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            {{Session::get('comments-done')}}
                        </div>
                        @endif
                        @error('name')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                {{$message}}
                            </div>
                        @enderror
                        @error('email')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                {{$message}}
                            </div>
                        @enderror
                        @error('comment')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                {{$message}}
                            </div>
                        @enderror
                    <div class="card mb-2">
                            <img src="http://placehold.it/460x250/e67e22/ffffff&text=HTML5" class="img-fluid" />
                        <div class="card-body">
                            <div>By <b>Tanvir</b> </div>
                            <time datetime="2014-01-20">January 20th, 2014</time>
                            <h4 class="card-title">{{$viewPostID->title}}</h4>
                            <p class="card-text">{{$viewPostID->body}}</p>
                        </div>
                    </div>
                    <div class="be-comment-block">
                        <h1 class="comments-title">Comments ({{count($comments)}})</h1>
                        @foreach($comments as $comment)
                        <div class="be-comment">
                            <div class="be-img-comment">	
                                <a href="#">
                                    <img src="https://randomuser.me/api/portraits/men/{{$comment->id}}.jpg" alt="" class="be-ava-comment">
                                </a>
                            </div>
                            <div class="be-comment-content">
                                
                                    <span class="be-comment-name">
                                        <a href="#">{{$comment->name}}</a>
                                        </span>
                                    <span class="be-comment-time">
                                        <i class="fa fa-clock-o"></i>
                                        {{$comment->created_at->format('d F Y, g:ia')}}
                                    </span>

                                <p class="be-comment-text">{{$comment->comment}}</p>
                            </div>
                        </div>
                        @endforeach
                        

                        <form class="form-block" method="post" action="{{route('submit.comments')}}">
                        @csrf
                        <input class="invisible" type="text" name="post_id" value="{{$viewPostID->id}}">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-lg-6">
                                    <div class="form-group fl_icon">
                                        <div class="icon"><i class="fa fa-user"></i></div>
                                        <input name="name" class="form-input" type="text" placeholder="Your name">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-lg-6 fl_icon">
                                    <div class="form-group fl_icon">
                                        <div class="icon"><i class="fa fa-envelope-o"></i></div>
                                        <input name="email" class="form-input" type="email" placeholder="Your email">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-12">									
                                    <div class="form-group">
                                        <textarea name="comment" class="form-input" placeholder="Your text"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary float-right text-white" type="submit">Comment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h1>Related Post</h1>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="card mb-2">
                                    <img src="http://placehold.it/460x250/e67e22/ffffff&text=HTML5" class="img-fluid" />
                                <div class="card-body">
                                    <div>By <b>Tanvir</b> </div>
                                    <time datetime="2014-01-20">January 20th, 2014</time>
                                    <h4 class="card-title">fadsfdas</h4>
                                    <p class="card-text">fasdf</p>
                                    <a href="" class="btn float-right btn-warning btn-sm">Read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="card mb-2">
                                    <img src="http://placehold.it/460x250/e67e22/ffffff&text=HTML5" class="img-fluid" />
                                <div class="card-body">
                                    <div>By <b>Tanvir</b> </div>
                                    <time datetime="2014-01-20">January 20th, 2014</time>
                                    <h4 class="card-title">fadsfdas</h4>
                                    <p class="card-text">fasdf</p>
                                    <a href="" class="btn float-right btn-warning btn-sm">Read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="card mb-2">
                                    <img src="http://placehold.it/460x250/e67e22/ffffff&text=HTML5" class="img-fluid" />
                                <div class="card-body">
                                    <div>By <b>Tanvir</b> </div>
                                    <time datetime="2014-01-20">January 20th, 2014</time>
                                    <h4 class="card-title">fadsfdas</h4>
                                    <p class="card-text">fasdf</p>
                                    <a href="" class="btn float-right btn-warning btn-sm">Read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="card mb-2">
                                    <img src="http://placehold.it/460x250/e67e22/ffffff&text=HTML5" class="img-fluid" />
                                <div class="card-body">
                                    <div>By <b>Tanvir</b> </div>
                                    <time datetime="2014-01-20">January 20th, 2014</time>
                                    <h4 class="card-title">fadsfdas</h4>
                                    <p class="card-text">fasdf</p>
                                    <a href="" class="btn float-right btn-warning btn-sm">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <x-sidebar />
        </div>
    </div>
    
</div>
@endsection