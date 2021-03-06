@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Add Extra Messing') }}</h5>
                </div>
                <form method="post" action="{{ route('em.put') }}" autocomplete="off">
                    <div class="card-body">
                        @csrf
                        @method('put')

                        @include('alerts.success')

                        <div class="form-group{{ $errors->has('bd_no') ? ' has-danger' : '' }}">
                            <label>{{ _('BD No') }}</label>
                            <input required type="text" name="bd_no"
                                   class="form-control{{ $errors->has('bd_no') ? ' is-invalid' : '' }}"
                                   placeholder="{{ _('BD No') }}">
                            @include('alerts.feedback', ['field' => 'bd_no'])
                        </div>

                        <script>

                            $(document).ready(function () {
                                $("#press").click(function () {
                                    var cars = [@foreach($res as $item)"{{ __($item->item_price) }}", @endforeach ""];
                                    var tmp = document.getElementById('list')
                                    if (tmp.value != "") {
                                        index = tmp.selectedIndex;
                                        //price = document.getElementById("price");
                                        //if (price.value != "")
                                        //   price = parseInt(price.value);
                                        //else
                                        //    price = 0
                                        //price += parseInt(cars[index - 1]);
                                        //document.getElementById("price").value = price;
                                        if (document.getElementById("ilist").value != "")
                                            document.getElementById("ilist").value += ', ' + document.getElementById('list').value;
                                        else
                                            document.getElementById("ilist").value += document.getElementById('list').value;
                                        document.getElementById('list').selectedIndex = 0;
                                    }
                                });
                            });


                        </script>

                        <div class="form-group{{ $errors->has('item') ? ' has-danger' : '' }}">
                            <label>{{ _('Select and Press add') }}</label>
                            <select id="list" name="item"
                                    class="form-control{{ $errors->has('item') ? ' is-invalid' : '' }}">
                                <option value=""></option>
                                @foreach($res as $item)
                                    <option value="{{ __($item->item_name) }}">{{ __($item->item_name) }}</option>
                                @endforeach
                            </select>
                            <button name="press" id="press"
                                    class="form-control{{ $errors->has('press') ? ' is-invalid' : '' }}" type="button">
                                Add
                            </button>
                            <input required id="ilist" type="text" name="item_list"
                                   class="form-control{{ $errors->has('item_list') ? ' is-invalid' : '' }}"
                                   placeholder="{{ _('Item List') }}">
                            @include('alerts.feedback', ['field' => 'item'])
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                            <label>{{ _('Price') }}</label>
                            <input required id="price" type="number" min="0" name="price"
                                   class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}"
                                   placeholder="{{ _('price') }}">
                            @include('alerts.feedback', ['field' => 'price'])
                        </div>

                        <div class="form-group{{ $errors->has('date') ? ' has-danger' : '' }}">
                            <label>{{ _('Date') }}</label>
                            <input required type="date" name="date"
                                   class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}">
                            @include('alerts.feedback', ['field' => 'date'])
                        </div>

                        {{--<div class="form-group{{ $errors->has('storeman') ? ' has-danger' : '' }}">--}}
                        {{--<label>{{ _('StoreMan') }}</label>--}}
                        {{--<select name="storeman"--}}
                        {{--class="form-control{{ $errors->has('storeman') ? ' is-invalid' : '' }}">--}}
                        {{--<option value="Abdul Jobbar">Abdul Jobbar</option>--}}
                        {{--</select>--}}
                        {{--@include('alerts.feedback', ['field' => 'storeman'])--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('messw') ? ' has-danger' : '' }}">--}}
                        {{--<label>{{ _('Mess Waiter') }}</label>--}}
                        {{--<select name="messw"--}}
                        {{--class="form-control{{ $errors->has('messw') ? ' is-invalid' : '' }}">--}}
                        {{--<option value="Motin">Motin</option>--}}
                        {{--</select>--}}
                        {{--@include('alerts.feedback', ['field' => 'messw'])--}}
                        {{--</div>--}}

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ _('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
<script type="text/javascript"
        src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
</script>