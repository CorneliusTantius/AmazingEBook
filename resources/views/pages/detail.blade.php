@extends('layouts.main')
@section('content')
    <div class="px-5 py-5 text-center" style="margin-left: 30vw; margin-right:30vw;">
        <h1 class="display-5 ">{{ $book->title }}</h1>
        <h5>{{ $book->author }}</h5>
        <hr>
        <p>{{ $book->description }}</p>
        <a href="/api/add/{{ $book->ebook_id }}" class="btn btn-primary">{{ __('app.addtocart') }}</a>
    </div>
@endsection
