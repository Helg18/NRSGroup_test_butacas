@extends('welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h4>User Profile: {{ $user->fullName() }}</h4>
                </div>
                <table class="table">
                    <tr>
                        <td>Full name</td>
                        <td>{{ $user->fullName() }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                </table>
                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div style="display: flex">
                        <a href="{{ route('users.index') }}" class="btn btn-outline-primary m-1"><i
                                    class="fa fa-arrow-left"></i></a>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-success m-1"><i
                                    class="fa fa-pen"></i></a>
                        <button type="submit" class="btn btn-outline-danger m-1"><i class="fa fa-trash"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection