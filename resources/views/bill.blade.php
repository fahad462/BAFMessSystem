@extends('layouts.app', ['page' => __('Tables'), 'pageSlug' => 'tables'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Select A Bd No') }}</h5>
                </div>
                <form method="get" autocomplete="off">
                    <div class="card-body">
                        <div class="form-group{{ $errors->has('bds') ? ' has-danger' : '' }}">
                            {{--<label>{{ _('StoreMan') }}</label>--}}
                            <select onchange="nicee()" id="bds" name="bds"
                                    class="form-control{{ $errors->has('bds') ? ' is-invalid' : '' }}">
                                <option selected value="{{ __($se) }}">{{ __($se) }}</option>
                                @foreach($bds as $item)
                                    @if($item->bd_no != $se)
                                        <option value="{{ __($item->bd_no) }}">{{ __($item->bd_no) }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <script>
                                function nicee() {
                                    $tmp = document.getElementById('bds');

                                    window.location.href = '{{ __(route('get.bill')) }}' + '/' + $tmp.value;
                                }
                            </script>
                            @include('alerts.feedback', ['field' => 'bds'])
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> Daily Mess Bills</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    Entry Time
                                </th>
                                <th>
                                    Bd No
                                </th>
                                <th>
                                    Breakfast Items
                                </th>
                                <th>
                                    Lunch Items
                                </th>
                                <th>
                                    Dinner Items
                                </th>
                                <th>
                                    Billed Date
                                </th>
                                <th class="text-center">
                                    Bill
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($dmb as $item)
                                <tr>
                                    <td>
                                        {{ __($item->id) }}
                                    </td>
                                    <td>
                                        {{ __($item->timestamp) }}
                                    </td>
                                    <td>
                                        {{ __($item->Bd_no) }}
                                    </td>
                                    <td>
                                        {{ __($item->bfi) }}
                                    </td>
                                    <td>
                                        {{ __($item->lunch) }}
                                    </td>
                                    <td>
                                        {{ __($item->dinner) }}
                                    </td>
                                    <td>
                                        {{ __($item->date) }}
                                    </td>
                                    <td class="text-center">
                                        {{ __($item->price) }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card  card-plain">
                <div class="card-header">
                    <h4 class="card-title"> Extra Messing Bill</h4>
                    {{--<p class="category"> Here is a subtitle for this table</p>--}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                            <tr>
                                <th>
                                    Order Id
                                </th>
                                <th>
                                    Bd No
                                </th>
                                <th>
                                    Date
                                </th>
                                <th>
                                    Items
                                </th>
                                <th class="text-center">
                                    Bill
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($emb as $item)
                                <tr>
                                    <td>
                                        {{ __($item->Order_id) }}
                                    </td>
                                    <td>
                                        {{ __($item->bd_no) }}
                                    </td>
                                    <td>
                                        {{ __($item->datestamp) }}
                                    </td>
                                    <td>
                                        {{ __($item->items) }}
                                    </td>
                                    <td class="text-center">
                                        {{ __($item->price) }}
                                    </td>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> Bar Bills</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                            <tr>
                                <th>
                                    Order Id
                                </th>
                                <th>
                                    Bd No
                                </th>
                                <th>
                                    Date time
                                </th>
                                <th>
                                    Items
                                </th>
                                <th>
                                    Store Man
                                </th>
                                <th>
                                    Bar Man
                                </th>
                                <th class="text-center">
                                    Bill
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bb as $item)
                                <tr>
                                    <td>
                                        {{ __($item->id) }}
                                    </td>
                                    <td>
                                        {{ __($item->bd_no) }}
                                    </td>
                                    <td>
                                        {{ __($item->timestamp) }}
                                    </td>
                                    <td>
                                        {{ __($item->items) }}
                                    </td>
                                    <td>
                                        {{ __($item->store_man) }}
                                    </td>
                                    <td>
                                        {{ __($item->bar_man) }}
                                    </td>
                                    <td class="text-center">
                                        {{ __($item->price) }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card  card-plain">
                <div class="card-header">
                    {{--<h4 class="card-title"> Extra Messing Bill</h4>--}}
                    {{--<p class="category"> Here is a subtitle for this table</p>--}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                            <tr>
                                <th class="text-center">
                                    Total Bill = {{ __($tot) }}
                                </th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
