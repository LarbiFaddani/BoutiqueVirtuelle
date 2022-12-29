@extends('layouts.layout')
@section('content')
<div class="container text-center">
  <h2 class="bg-primary my-2 text-center rounded">page show</h2>
  <div class="card mx-auto mt-5"  style="width: 700px;" style="width: 18rem;">
  <img src="{{ asset($article_single->image) }}" width="100px" height="400" class="card-img-top" alt="">
    <div class="card-body">
      <h5 class="card-title">{{ $article_single -> design }}</h5>
      <p class="card-text">{{ $article_single -> Description }}</p>
      <a href="{{ route('index') }}" class="btn btn-primary w-100">Page Acceuil </a>
    </div>
  </div>
</div>
@endsection
