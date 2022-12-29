@extends('layouts.layout')
@section('content')
<div class="container justify-content-center mr-4">
    <h2 class="bg-primary text-center">page create</h2>
    <form action="{{ route('update',$article_single->id) }}" method="post">
        @csrf
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="" class="form-label">Desing</label>
                    <input type="text" class="form-control" name="design" value="{{ $article_single->design }}" >
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="" class="form-label">Categorie</label>
                    <input type="text" class="form-control" name="categorie" value="{{ $article_single->categorie }}">
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
            <div class="mb-3">
                <label for="" class="form-label">Puv</label>
                <input type="text" class="form-control" name="puv" value="{{ $article_single->puv }}">
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Image</label>
                <input type="file" class="form-control" name="image" accept=".jpg, .jpeg, .png" 
                    value="{{ $article_single->image }}">
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="" class="form-label">Unite</label>
                    <input type="text" class="form-control" name="unite" value="{{ $article_single->unite }}">
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="" class="form-label">Quantite</label>
                    <input type="text" class="form-control" name="quantite" value="{{ $article_single->quantite }}">
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
                
            <div class="mb-3">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" 
                name="description" rows="3" >{{  $article_single->description }} </textarea>
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
                       
            <input type="submit" class="btn btn-primary w-100" value="Modifier">
    </form>
</div>
@endsection
