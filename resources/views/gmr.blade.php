@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])
<style>
    #myProgress {
        width: 100%;
        background-color: grey;
    }

    #myBar {
        width: 1%;
        height: 30px;
        background-color: green;
    }
</style>
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Add Daily Messing') }}</h5>
                </div>
                {{--<form autocomplete="off">--}}
                <div class="card-body">
                    <div>
                        {{--<label>{{ _('BD No') }}</label>--}}
                        <Button class="btn btn-fill btn-primary" type="button" id="click"
                        >Generate
                        </Button>
                    </div>
                    <div><p>&nbsp;</p></div>
                    <div>
                        <div id="myProgress">
                            <div id="myBar"></div>
                        </div>
                    </div>

                    <script>

                        $(document).ready(function () {
                            $("#click").click(function () {
                                document.getElementById("myProgress").style.visibility = "visible"
                                var tt = document.getElementById("myBar")
                                var n = {{ __($maxima) }};
                                var cars = [@foreach($list as $item)"{{ __($item->Bd_no) }}", @endforeach ""];
                                for (i = 0; i < n; i++) {
                                    console.log(cars[i])
                                    var vv = (100 * (i + 1)) / (n)
                                    console.log(vv)
                                    tt.style.width = vv + "%"

                                    $.post('{{route('mpms')}}' + '/' + cars[i], {
                                            "_token": "{{ csrf_token() }}"
                                        }
                                    ).done(function (response) {
                                        alert(response)
                                        //if (response == 'Extra Messing Item Added')
                                        //location.reload()
                                    }).fail(function () {
                                        alert("error");
                                    });
                                }
                            })
                        });
                    </script>

                </div>
            </div>
        </div>
    </div>
@endsection

<script type="text/javascript"
        src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
</script>