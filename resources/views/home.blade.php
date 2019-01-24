@extends('welcome')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="float-left">
                    <h2><i class="fa fa-tachometer-alt"></i> Dashboard</h2>
                </div>
                <div class="float-right">
                    <a href="{{ route('users.create') }}" class="btn btn-outline-success fa-1x"><i
                                class="fa fa-user"></i> Add User</a>
                    <a href="{{ route('reservations.create') }}" class="btn btn-outline-danger fa-1x"><i
                                class="fa fa-paste"></i> Add Reservation</a>
                </div>
            </div>
        </div>
        <hr>
        <div class="row mt-5">
            <div class="col-md-6">
                <h3>Users</h3>
                @if(count($users) <= 0)
                    <div>
                        No users found.
                    </div>
                @else
                    <table class="table table-hover table-condensed">
                        <thead>
                        <td>Name</td>
                        <td>Email</td>
                        <td colspan="2">Member Since</td>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->fullname() }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ date('Y') }} </td>
                                <td><a href="{{ route('users.show', $user->id) }}"><i class="fa fa-eye"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            <div class="col-md-6">
                <h3>Reservations</h3>
                @if(count($users) <= 0)
                    <div>
                        No users found.
                    </div>
                @else
                    <table class="table table-hover table-condensed">
                        <thead>
                        <td>ID</td>
                        <td>Owner</td>
                        <td colspan="2">Date</td>
                        </thead>
                        <tbody>
                        @foreach($reservations as $reservation)
                            <tr>
                                <td>{{ $reservation->id }}</td>
                                <td>{{ $reservation->ownerFullName() }}</td>
                                <td>{{ $reservation->reserved_at }}</td>
                                <td><a href="{{ route('reservations.show', $reservation->id) }}"><i
                                                class="fa fa-eye"></i></a></td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection