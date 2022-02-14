@extends('layouts.main')
@section('content')
    @if (Auth::check())
        <div class="mx-5 text-center" style="padding-left: 20vw; padding-right: 20vw;">
            <div class="px-5 py-5 my-5 mx-5 text-center">
                <table class="table " style="border-collapse:collapse;" id="books">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 40%">{{ __('app.title') }}</th>
                            <th scope="col">{{ __('app.author') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($books->total() == 0)
                            <tr>
                                <td colspan="12">
                                    {{ __('app.nouser') }}
                                </td>
                            </tr>
                        @else
                            @foreach ($books as $book)
                                <tr>
                                    <td>
                                        <a href="/book/{{ $book->ebook_id }}" onclick="trigger({{ $book->ebook_id }});"
                                            class="text-decoration-none">
                                            {{ $book->title }}
                                        </a>
                                    </td>
                                    <td>{{ $book->author }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                {!! $books->links() !!}
            </div>
        </div>
    @else
        <div class="px-5 py-5 my-5 text-center">
            <h1 class="display-5 fw-bold">Amazing E-Book</h1>
            <h1 class="display-5 ">{{ __('app.motto') }}</h1>
        </div>
    @endif
@endsection
