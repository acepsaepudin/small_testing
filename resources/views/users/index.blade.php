@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>
                <div class="card-body">
                    @if($users->isNotEmpty())
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{!! $user->name !!}</td>
                            <td>{!! $user->email !!}</td>
                            <td>
                                <a href="{{route('users.edit', $user->id)}}" class="btn btn-info">Edit</a>
                                <form method="POST" action="{{route('users.destroy', $user->id)}}">
                                    <input type="hidden" name="_method" value="delete">
                                    {!! csrf_field() !!}
                                <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                        @endforeach
                      </tbody>
                      @else
                      <h3>User not found.</h3>
                      @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
