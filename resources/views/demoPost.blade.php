@extends('welcome')

@foreach($postsData as $post)
            <div class="card mt-2">
                <div class="card-body">
                    <h4 class="card-title">{{$post->title}}</h4>
                    <p class="card-text">{{$post->body}}</p>
                </div>
            </div>
            @endforeach