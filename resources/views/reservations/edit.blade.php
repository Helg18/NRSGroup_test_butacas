@extends('welcome')

@section('page_title', 'Update Reservations')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="float-left">
                    <h2><i class="fa fa-paste"></i> Edit a reservation</h2>
                </div>
            </div>
            <div class="container-fluid mt-5">
                <form action="{{ route('reservations.update', $reservation->id) }}" method="post">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="col-md-12">
                        <div class="form-group">
                            <h3><label for="first_name">Owner</label></h3>
                            <select name="user_id" id="user_id" class="form-control">
                                <option value="">Select a option</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $reservation->user_id == $user->id ? "selected" : "" }}>{{ $user->fullname() }}
                                        - {{ $user->email }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <h3><label for="last_name">Date</label></h3>
                            <input type="date" name="reserved_at" class="form-control" required autocomplete="off"
                                   value="{{ $reservation->reserved_at }}"/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <h3><label for="email">Number of persons</label></h3>
                            <input type="number" name="persons" id="persons" class="form-control" required
                                   autocomplete="off"
                                   value="{{ $reservation->persons }}" readonly/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <h3><label for="email">Comments</label></h3>
                            <textarea name="comments" class="form-control"
                                      autocomplete="off">{{$reservation->comments}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <h3><label for="email">Butacas</label></h3>
                            <div class="row">
                                @foreach($butacas as $butaca)
                                    @if($butaca->col != 10)
                                        <div class="col-md-1 table-bordered m-1 {{ $butaca->available ? '' : 'alert-warning' }} {{ in_array($butaca->id, $selected, true) ? "alert-success" : "" }}">
                                            <label for="{{$butaca->id}}" class="p-1">
                                                <i class="fa fa-chair fa-3x"></i>
                                                <input type="checkbox" name="butaca_id[]" id="{{$butaca->id}}"
                                                       value="{{ $butaca->id }}"
                                                       {{ in_array($butaca->id, $selected, true) ? "checked" : "" }}
                                                       onclick="countDiscountButaca(this)"/>
                                                {{ $butaca->key }}
                                            </label>
                                        </div>
                                    @else
                                        <div class="col-md-1 table-bordered m-1 {{ $butaca->available ? '' : 'alert-warning' }} {{ in_array($butaca->id, $selected, true) ? "alert-success" : "" }}">
                                            <label for="{{$butaca->id}}" class="p-1">
                                                <i class="fa fa-chair fa-3x"></i>
                                                <input type="checkbox" name="butaca_id[]" id="{{$butaca->id}}"
                                                       value="{{ $butaca->id }}"
                                                       {{ $butaca->available ? '' : 'disabled' }}
                                                       onclick="countDiscountButaca(this)"/>
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
                            <button class="btn btn-outline-success m-1" type="submit"><i class="fa fa-save fa-2x"></i>
                            </button>
                        </div>
                    </div>
                </form>
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