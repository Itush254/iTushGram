@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-3 p-6">
      <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100">
    </div>
    <div class="col-9 pt-5">
      <div class="d-flex justify-content-between align-items-md-baseline">
        <div class="d-flex align-items-center pb-3">
          <div class="h4">{{$user->username}}</div>

          <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
        </div>



      </div>

      @can('update', $user->profile)
      <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
      @endcan
      <div class="d-flex">
        <div class="pe-3"><strong>{{ $postCount}}</strong>posts</div>
        <div class="pe-3"><strong>{{ $followersCount }}</strong>followers</div>
        <div class="pe-3"><strong>{{ $followingCount }}</strong>following</div>
      </div>

      <div class="pt-4 fw-bold">{{$user->profile->title}}</div>
      <div>{{$user->profile->description}}</div>
      <div><a href="itushgram.com">{{$user->profile->url ?? 'N/A'}}</a></div>

    </div>
  </div>

  <hr>
  @can('update', $user->profile)
  <a href="/p/create" style="float: right;">Add New Post</a>
  @endcan

  <div class="row pt-5">
    @foreach ($user->posts as $post)
    <div class="col-4 pb-4">
      <a href="/p/{{$post->id}}">
        <img src="/storage/{{ $post->image }}" class="w-100">
      </a>
    </div>

    @endforeach



  </div>
</div>
@endsection