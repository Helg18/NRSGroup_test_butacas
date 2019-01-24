@extends('welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="float-left">
                    <h2><i class="fa fa-user"></i> Update a user</h2>
                </div>
            </div>
            <div class="container-fluid mt-5">
                <form action="{{ route('users.update', $user->id) }}" method="post">
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <h3><label for="first_name">First name</label></h3>
                            <input type="text" name="first_name" class="form-control" required autocomplete="off"
                                   value="{{ $user->first_name }}"/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <h3><label for="last_name">Last name</label></h3>
                            <input type="text" name="last_name" class="form-control" required autocomplete="off"
                                   value="{{ $user->last_name }}"/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <h3><label for="email">Email</label></h3>
                            <input type="email" name="email" class="form-control" required autocomplete="off"
                                   value="{{ $user->email }}"/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="align-content-center">
                            <a href="{{ route('users.index') }}" class="btn btn-outline-primary m-1"><i
                                        class="fa fa-arrow-left fa-2x"></i></a>
                            <button class="btn btn-outline-success m-1" type="submit"><i class="fa fa-save fa-2x"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection