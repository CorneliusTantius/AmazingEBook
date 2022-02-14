@extends('layouts.main')
@section('content')
    @if (Auth::check())
        <div class="mx-5 text-center" style="padding-left: 20vw; padding-right: 20vw;">
            <div class="px-5 py-5 my-5 mx-5 text-center">
                <table class="table " style="border-collapse:collapse;" id="books">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 60%">Name</th>
                            <th scope="col">Role</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($users) == 0)
                            <tr>
                                <td colspan="12">
                                    {{ __('app.nouser') }}
                                </td>
                            </tr>
                        @else
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        {{ $user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name }}
                                    </td>
                                    <td>
                                        {{ $user->role()->first()->role_desc }}
                                    </td>
                                    <td><a
                                            href="/api/user/changerole/{{ $user->account_id }}">{{ __('app.changerole') }}</a>
                                    </td>
                                    <td><a href="/api/user/delete/{{ $user->account_id }}">{{ __('app.delete') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="px-5 py-5 my-5 text-center">
            <h1 class="display-5 fw-bold">Amazing E-Book</h1>
            <h1 class="display-5 ">Find and rent your E-Book here</h1>
        </div>
    @endif
@endsection
