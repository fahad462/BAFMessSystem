@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Add Daily Messing') }}</h5>
                </div>
                {{--<form autocomplete="off">--}}
                <div class="card-body">
                    <div class="form-group{{ $errors->has('bd_no') ? ' has-danger' : '' }}">
                        <label>{{ _('BD No') }}</label>
                        <input id="bd_no" min="0" required type="number" name="bd_no"
                               class="form-control{{ $errors->has('bd_no') ? ' is-invalid' : '' }}"
                               placeholder="{{ _('BD No') }}">
                        @include('alerts.feedback', ['field' => 'bd_no'])
                    </div>

                    <div class="form-group{{ $errors->has('bf') ? ' has-danger' : '' }}">
                        <label>{{ _('Breakfast Items') }}</label>
                        <input id="bf" name="bf" type="text"
                               class="form-control{{ $errors->has('bf') ? ' is-invalid' : '' }}"
                               placeholder="{{ _('Items') }}">
                        @include('alerts.feedback', ['field' => 'bf'])
                    </div>

                    {{--<script>--}}
                    {{--$(document).ready(function () {--}}
                    {{--$("#bf").change(function () {--}}
                    {{--var a = document.getElementById('bf');--}}
                    {{--// alert(a);--}}
                    {{--// alert('please wait until checking has been done');--}}
                    {{--//alert(a.checked)--}}
                    {{--if (a.checked == false) r = 'de';--}}
                    {{--else--}}
                    {{--r = 'breakfast'--}}
                    {{--$.post('{{route('gdmprice')}}', {--}}
                    {{--"_token": "{{ csrf_token() }}",--}}
                    {{--'day': 'breakfast'--}}
                    {{--}--}}
                    {{--).done(function (response) {--}}
                    {{--//alert(response);--}}
                    {{--if (r == 'breakfast') {--}}
                    {{--if (document.getElementById('price').value != '')--}}
                    {{--pc = parseInt(document.getElementById('price').value);--}}
                    {{--else--}}
                    {{--pc = 0;--}}
                    {{--pc += parseInt(response);--}}
                    {{--document.getElementById('price').value = pc + '';--}}
                    {{--} else {--}}
                    {{--if (document.getElementById('price').value != '') {--}}
                    {{--pc = parseInt(document.getElementById('price').value);--}}
                    {{--pc -= parseInt(response);--}}
                    {{--document.getElementById('price').value = pc + '';--}}
                    {{--}--}}
                    {{--}--}}
                    {{--}).fail(function () {--}}
                    {{--alert("error");--}}
                    {{--});--}}
                    {{--});--}}
                    {{--})--}}
                    {{--;--}}

                    {{--$(document).ready(function () {--}}
                    {{--$("#lunch").change(function () {--}}
                    {{--var a = document.getElementById('bf');--}}
                    {{--// alert(a);--}}
                    {{--// alert('please wait until checking has been done');--}}
                    {{--//alert(a.checked)--}}
                    {{--if (a.checked == false) r = 'de';--}}
                    {{--else--}}
                    {{--r = 'breakfast'--}}
                    {{--$.post('{{route('gdmprice')}}', {--}}
                    {{--"_token": "{{ csrf_token() }}",--}}
                    {{--'day': 'lunch'--}}
                    {{--}--}}
                    {{--).done(function (response) {--}}
                    {{--//alert(response);--}}
                    {{--if (r == 'breakfast') {--}}
                    {{--if (document.getElementById('price').value != '')--}}
                    {{--pc = parseInt(document.getElementById('price').value);--}}
                    {{--else--}}
                    {{--pc = 0;--}}
                    {{--pc += parseInt(response);--}}
                    {{--document.getElementById('price').value = pc + '';--}}
                    {{--} else {--}}
                    {{--if (document.getElementById('price').value != '') {--}}
                    {{--pc = parseInt(document.getElementById('price').value);--}}
                    {{--pc -= parseInt(response);--}}
                    {{--document.getElementById('price').value = pc + '';--}}
                    {{--}--}}
                    {{--}--}}
                    {{--}).fail(function () {--}}
                    {{--alert("error");--}}
                    {{--});--}}
                    {{--});--}}
                    {{--})--}}
                    {{--;--}}

                    {{--$(document).ready(function () {--}}
                    {{--$("#dinner").change(function () {--}}
                    {{--var a = document.getElementById('bf');--}}
                    {{--// alert(a);--}}
                    {{--// alert('please wait until checking has been done');--}}
                    {{--//alert(a.checked)--}}
                    {{--if (a.checked == false) r = 'de';--}}
                    {{--else--}}
                    {{--r = 'breakfast'--}}
                    {{--$.post('{{route('gdmprice')}}', {--}}
                    {{--"_token": "{{ csrf_token() }}",--}}
                    {{--'day': 'dinner'--}}
                    {{--}--}}
                    {{--).done(function (response) {--}}
                    {{--//alert(response);--}}
                    {{--if (r == 'breakfast') {--}}
                    {{--if (document.getElementById('price').value != '')--}}
                    {{--pc = parseInt(document.getElementById('price').value);--}}
                    {{--else--}}
                    {{--pc = 0;--}}
                    {{--pc += parseInt(response);--}}
                    {{--document.getElementById('price').value = pc + '';--}}
                    {{--} else {--}}
                    {{--if (document.getElementById('price').value != '') {--}}
                    {{--pc = parseInt(document.getElementById('price').value);--}}
                    {{--pc -= parseInt(response);--}}
                    {{--document.getElementById('price').value = pc + '';--}}
                    {{--}--}}
                    {{--}--}}
                    {{--}).fail(function () {--}}
                    {{--alert("error");--}}
                    {{--});--}}
                    {{--});--}}
                    {{--})--}}
                    {{--;--}}
                    {{--</script>--}}

                    {{--<div class="form-group{{ $errors->has('lunch') ? ' has-danger' : '' }}">--}}
                    {{--<input id="lunch" type="checkbox" name="lunch" value="lunch">--}}
                    {{--<label>{{ _('Lunch') }}</label>--}}
                    {{--@include('alerts.feedback', ['field' => 'lunch'])--}}
                    {{--</div>--}}

                    {{--<div class="form-group{{ $errors->has('dinner') ? ' has-danger' : '' }}">--}}
                    {{--<input id="dinner" type="checkbox" name="dinner" value="dinner">--}}
                    {{--<label>{{ _('Dinner') }}</label>--}}
                    {{--@include('alerts.feedback', ['field' => 'breakfast'])--}}
                    {{--</div>--}}


                    <div class="form-group{{ $errors->has('lu') ? ' has-danger' : '' }}">
                        <label>{{ _('Lunch Items') }}</label>
                        <input id="lu" name="lu" type="text"
                               class="form-control{{ $errors->has('lu') ? ' is-invalid' : '' }}"
                               placeholder="{{ _('Items') }}">
                        @include('alerts.feedback', ['field' => 'lu'])
                    </div>

                    <div class="form-group{{ $errors->has('di') ? ' has-danger' : '' }}">
                        <label>{{ _('Dinner Items') }}</label>
                        <input id="di" name="di" type="text"
                               class="form-control{{ $errors->has('di') ? ' is-invalid' : '' }}"
                               placeholder="{{ _('Items') }}">
                        @include('alerts.feedback', ['field' => 'di'])
                    </div>

                    <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                        <label>{{ _('Price') }}</label>
                        <input required min="0" id="price" type="number" min="0" name="price"
                               class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}"
                               placeholder="{{ _('price') }}">
                        @include('alerts.feedback', ['field' => 'price'])
                    </div>

                    <div class="form-group{{ $errors->has('date') ? ' has-danger' : '' }}">
                        <label>{{ _('Date') }}</label>
                        <input required id="date" type="date" name="date"
                               class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}"
                               placeholder="{{ _('date') }}">
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

                </div>
                <div class="card-footer">
                    <button onclick="postr()" class="btn btn-fill btn-primary">{{ _('Save') }}</button>
                </div>
                <script>
                    function postr() {
                        $bd = document.getElementById("bd_no").value;
                        $price = document.getElementById("price").value;
                        $bf = document.getElementById("bf").value;
                        $di = document.getElementById('di').value
                        $lu = document.getElementById('lu').value
                        $date = document.getElementById('date').value
                        $.post('{{route('dm.add.put')}}', {
                                "_token": "{{ csrf_token() }}",
                                "bd": $bd,
                                "price": $price,
                                "bf": $bf,
                                "di": $di,
                                "lu": $lu,
                                "date": $date
                            }
                        ).done(function (response) {
                            alert(response)
                        }).fail(function () {
                            alert("error");
                        });
                    }
                </script>
                {{--</form>--}}
            </div>
        </div>
    </div>
    </div>
@endsection

<script type="text/javascript"
        src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
</script>