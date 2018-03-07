@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>
                <div class="card-body">
                @if($errors->isNotEmpty())
                <div class="alert alert-danger" role="alert">
                  @foreach ($errors->all() as $error)
                      <div>{{ $error }}</div>
                  @endforeach
                </div>
                @endif
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        <input type="hidden" name="_method" value="put">
                        {!! csrf_field() !!}
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" name="name" class="form-control" id="name" value="{!! $user->name !!}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{!! $user->email !!}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
