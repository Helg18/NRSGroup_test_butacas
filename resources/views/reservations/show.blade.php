@extends('welcome')

@section('page_title', 'Update Reservations')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="float-left">
                    <h2><i class="fa fa-paste"></i> Show a reservation</h2>
                </div>
            </div>
            <div class="container-fluid mt-5">
                <form action="{{ route('reservations.update', $reservation->id) }}" method="post">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="col-md-12">
                        <div class="form-group">
                            <h5><label for="first_name">Owner</label></h5>
                            <h2 class="ml-5">{{ $reservation->ownerFullname() }} - {{ $reservation->ownerEmail() }}</h2>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <h5><label for="last_name">Date</label></h5>
                            <h2 class="ml-5">{{ $reservation->reserved_at }}</h2>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <h5><label for="email">Number of persons</label></h5>
                            <h2 class="ml-5">{{ $reservation->persons }}</h2>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <h5><label for="email">Comments</label></h5>
                            <h2 class="ml-5">{{$reservation->comments}}</h2>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <h3><label for="email">Butacas</label></h3>
                            <div class="row">
                                @foreach($butacas as $butaca)
                                    @if($butaca->col != 10)
                                        <div class="col-md-1 table-bordered m-1 {{ in_array($butaca->id, $selected, true) ? "alert-success" : "" }}">
                                            <label for="{{$butaca->id}}" class="p-1">
                                                <i class="fa fa-chair fa-3x"></i><br>
                                                {{ $butaca->key }}
                                            </label>
                                        </div>
                                    @else
                                        <div class="col-md-1 table-bordered m-1 {{ in_array($butaca->id, $selected, true) ? "alert-success" : "" }}">
                                            <label for="{{$butaca->id}}" class="p-1">
                                                <i class="fa fa-chair fa-3x"></i><br>
                                                {{ $butaca->key }}
                                            </label>
                                        </div>
                            </div>
                            <div class="row">
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="align-content-center">
                            <a href="{{ route('reservations.index') }}" class="btn btn-outline-primary m-1"><i
                                        class="fa fa-arrow-left fa-2x"></i></a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript-inline')
    <script>
        function countDiscountButaca(obj) {
            var persons = $('#persons').val();

            persons = obj.checked ? parseInt(persons) + 1 : parseInt(persons) - 1;

            $('#persons').val(persons);
        }
    </script>
@endsection