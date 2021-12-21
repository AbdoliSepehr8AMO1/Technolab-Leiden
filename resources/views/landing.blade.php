@extends('layouts.master')

@section('content')


    <form  class="my-4 text-center" action="{{ route('search') }}" method="GET">
        <input type="text"  name="search" required/>
        <button type="submit">Search</button>
    </form>



    @if($posts->isNotEmpty())
        @foreach ($posts as $post)
            <div class="post-list">
            </div>
        @endforeach
    @else
        <div>
            <h2>No posts found</h2>
        </div>
    @endif





<div class="container">
<div class="row align-items-center">
  <div class="col-md-8 mx-auto">
    <h1 class="my-4 text-center">Welcome to the Technolab </h1>
    @foreach ($posts as $post)
    <div class="card mb-4">
      <img class="card-img-top" src=" {!! !empty($post->image) ? '/uploads/posts/' . $post->image :  'http://placehold.it/750x300' !!} " alt="Card image cap">
      <div class="card-body">
        <h2 class="card-title text-center">{{ $post->title }}</h2>
        <p class="card-text"> {{ str_limit($post->body, $limit = 280, $end = '...') }} </p>
        <a href="/posts/{{ $post->id }}" class="btn btn-primary">Read More &rarr;</a>
      </div>
      <div class="card-footer text-muted">
        Posted {{ $post->created_at->diffForHumans() }} by
        <a href="#">{{ $post->user->name }} </a>
      </div>
    </div>
    @endforeach

  </div>
  </div>
</div>
</div>

@endsection
