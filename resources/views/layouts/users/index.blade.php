@extends('welcome')

@section('content')
    <div class="container">
        <div class="row">
            <table class="table table-hover table-condensed">
                <thead>
                <td>Fisrt Name</td>
                <td>Last Name</td>
                <td>Email Name</td>
                <td>Actions</td>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>Acciones</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <td>Fisrt Name</td>
                <td>Last Name</td>
                <td>Email Name</td>
                <td>Actions</td>
                </tfoot>
            </table>
        </div>
    </div>
@endsection