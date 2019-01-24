@extends('welcome')

@section('page_title', 'Reservations')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="float-left">
                    <h2><i class="fa fa-list"></i> Reservations list</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-primary" href="{{ route('reservations.create') }}"><i class="fa fa-plus"></i></a>
                </div>
                <table class="table table-hover table-condensed">
                    @if(count($reservations) > 0)
                    <thead>
                    <td>Reservation #</td>
                    <td>Date</td>
                    <td>Owner Name</td>
                    <td>Quantity</td>
                    <td>Actions</td>
                    </thead>
                    @endif
                    <tbody>
                    @forelse($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->id }}</td>
                            <td>{{ $reservation->reserved_at }}</td>
                            <td>{{ $reservation->user->fullname() }}</td>
                            <td>{{ $reservation->persons }}</td>
                            <td>
                                <form action="{{ route('reservations.destroy', $reservation->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <div style="display: flex">
                                        <a href="{{ route('reservations.show', $reservation->id) }}"
                                           class="btn btn-outline-primary m-1"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('reservations.edit', $reservation->id) }}"
                                           class="btn btn-outline-success m-1"><i class="fa fa-pen"></i></a>
                                        <button type="submit" class="btn btn-outline-danger m-1"><i
                                                    class="fa fa-trash"></i></button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <div class="row">
                            <p style="margin-top: 80px;">
                                No reservation!
                            </p>
                        </div>
                    @endforelse
                    </tbody>
                    @if(count($reservations) > 0)
                    <tfoot>
                    <td>Reservation #</td>
                    <td>Date</td>
                    <td>Owner Name</td>
                    <td>Quantity</td>
                    <td>Actions</td>
                    </tfoot>
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection