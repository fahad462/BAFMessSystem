@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Breakfast Lunch Dinner') }}</h5>
                </div>
                <form method="post" action="{{ route('daily_messing.update.put') }}" autocomplete="off">
                    <div class="card-body">
                        @csrf
                        @method('put')
                        @include('alerts.success')
                        <div class="card-body">
                            <div class="form-group{{ $errors->has('day') ? ' has-danger' : '' }}">
                                <label>{{ _('Day') }}</label>
                                <select name="day" class="form-control{{ $errors->has('day') ? ' is-invalid' : '' }}">
                                    <option value=""></option>
                                    <option value="Saturday">Saturday</option>
                                    <option value="sunday">Sunday</option>
                                    <option value="monday">Monday</option>
                                    <option value="tuesday">Tuesday</option>
                                    <option value="wednesday">Wednesday</option>
                                    <option value="thursday">Thursday</option>
                                    <option value="friday">Friday</option>
                                </select>
                                @include('alerts.feedback', ['field' => 'day'])
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group{{ $errors->has('bitems') ? ' has-danger' : '' }}">
                                <label>{{ _('Breakfast') }}</label>
                                <input type="text" name="bitems"
                                       class="form-control{{ $errors->has('bitems') ? ' is-invalid' : '' }}"
                                       placeholder="{{ _('Breakfast Items') }}">
                                @include('alerts.feedback', ['field' => 'bitems'])
                            </div>

                            <div class="form-group{{ $errors->has('bprice') ? ' has-danger' : '' }}">
                                {{--<label>{{ _('Breakfast Price') }}</label>--}}
                                <input type="number" minvalue="0" name="bprice"
                                       class="form-control{{ $errors->has('bprice') ? ' is-invalid' : '' }}"
                                       placeholder="{{ _('Breakfast Price') }}">
                                @include('alerts.feedback', ['field' => 'bprice'])
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group{{ $errors->has('litems') ? ' has-danger' : '' }}">
                                <label>{{ _('Lunch') }}</label>
                                <input type="text" name="litems"
                                       class="form-control{{ $errors->has('litems') ? ' is-invalid' : '' }}"
                                       placeholder="{{ _('Lunch Items') }}">
                                @include('alerts.feedback', ['field' => 'litems'])
                            </div>

                            <div class="form-group{{ $errors->has('lprice') ? ' has-danger' : '' }}">
                                {{--<label>{{ _('Breakfast Price') }}</label>--}}
                                <input type="number" minvalue="0" name="lprice"
                                       class="form-control{{ $errors->has('lprice') ? ' is-invalid' : '' }}"
                                       placeholder="{{ _('Lunch Price') }}">
                                @include('alerts.feedback', ['field' => 'lprice'])
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group{{ $errors->has('ditems') ? ' has-danger' : '' }}">
                                <label>{{ _('Dinner') }}</label>
                                <input type="text" name="ditems"
                                       class="form-control{{ $errors->has('ditems') ? ' is-invalid' : '' }}"
                                       placeholder="{{ _('Dinner Items') }}">
                                @include('alerts.feedback', ['field' => 'ditems'])
                            </div>

                            <div class="form-group{{ $errors->has('dprice') ? ' has-danger' : '' }}">
                                {{--<label>{{ _('Breakfast Price') }}</label>--}}
                                <input type="number" minvalue="0" name="dprice"
                                       class="form-control{{ $errors->has('dprice') ? ' is-invalid' : '' }}"
                                       placeholder="{{ _('Dinner Price') }}">
                                @include('alerts.feedback', ['field' => 'dprice'])
                            </div>
                        </div>
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
