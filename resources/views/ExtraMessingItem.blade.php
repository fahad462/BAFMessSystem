@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .myButton {
        -moz-box-shadow: inset 0px 1px 0px 0px #ffffff;
        -webkit-box-shadow: inset 0px 1px 0px 0px #ffffff;
        box-shadow: inset 0px 1px 0px 0px #ffffff;
        background-color: transparent;
        display: inline-block;
        cursor: pointer;
        color: #666666;
        font-family: Arial;
        font-size: 15px;
        font-weight: bold;
        padding: 6px 24px;
        text-decoration: none;
    }

    .myButton:hover {
        background-color: transparent;
    }

    .myButton:active {
        position: relative;
        top: 0px;
    }
</style>

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Add Extra Messing Item') }}</h5>
                </div>

                <div class="card-body">
                    <label>{{ _('Item Name') }}</label>
                    <input id="name" type="text" name="emitem_name"
                           class="form-control{{ $errors->has('emitem_name') ? ' is-invalid' : '' }}"
                           placeholder="{{ _('Item Name') }}">
                    @include('alerts.feedback', ['field' => 'emitem_name'])
                    <button id="press" class="btn btn-fill btn-primary">{{ _('Add') }}</button>
                </div>
                <div class="card-footer">

                </div>
                <script>
                    $(document).ready(function () {
                        $("#press").click(function () {
                            $.post('{{route('mi.put')}}', {
                                    "_token": "{{ csrf_token() }}",
                                    'emitem_name': document.getElementById('name').value
                                }
                            ).done(function (response) {
                                alert(response)
                                if (response == 'Extra Messing Item Added')
                                    location.reload()
                            }).fail(function () {
                                alert("error");
                            });
                        });
                    });

                </script>

            </div>
        </div>
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> Daily Mess Bills</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">


                            @php
                                echo ('<tr>');
                                    echo('<th class="text-center">
                                Item Name
                            </th>');
                                    echo('<th>
                                Delete
                            </th>');

                                    echo('<th class="text-center">
                                Item Name
                            </th>');
                                    echo('<th>
                                Delete
                            </th>');

                                    echo('<th class="text-center">
                                Item Name
                            </th>');
                                    echo('<th>
                                Delete
                            </th>');

                            echo ('</tr>');


                            @endphp

                            </thead>
                            <tbody>
                            @php
                                $i = 0;
                                $len = count($res);
                                while($i < $len) {
                                echo ('<tr>');
                                try{
                                    echo('
                                    <td class="text-center">'.
                                        $res[$i]->item_name.'<td><i id="'.$res[$i]->item_id.'"onclick="repost(event)" class="fa fa-close"></i></td></td>');
                                    $i++;
                                    echo('
                                    <td class="text-center">'.
                                        $res[$i]->item_name.'<td><i id="'.$res[$i]->item_id.'"onclick="repost(event)" class="fa fa-close"></i></td></td>');
                                    $i++;
                                    echo('
                                    <td class="text-center">'.
                                        $res[$i]->item_name.'<td><i id="'.$res[$i]->item_id.'"onclick="repost(event)" class="fa fa-close"></i></td></td>');
                                    $i++;
                                    } catch (Exception $e) {}
                                    echo ('<tr>');
                                }

                            @endphp
                            </tbody>
                            <script>
                                function repost(e) {
                                    //alert(e.target.id)
                                    $temp = e.target.id
                                    $.post('{{route('mi.put.d')}}', {
                                            "_token": "{{ csrf_token() }}",
                                            "ids": $temp
                                        }
                                    ).done(function (response) {
                                        alert(response)
                                        //if (response == 'Extra Messing Item Added')
                                        location.reload()
                                    }).fail(function () {
                                        alert("error");
                                    });
                                }
                            </script>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script type="text/javascript"
        src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
</script>
