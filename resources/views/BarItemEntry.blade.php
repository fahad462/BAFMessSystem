@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Add Bar Item') }}</h5>
                </div>
                <form method="post" action="{{ route('bie.put') }}" autocomplete="off">
                    <div class="card-body">
                        @csrf
                        @method('put')
                        @include('alerts.success')

                        <div class="form-group{{ $errors->has('bitem_name') ? ' has-danger' : '' }}">
                            <label>{{ _('Item Name') }}</label>
                            <input type="text" name="bitem_name"
                                   class="form-control{{ $errors->has('bitem_name') ? ' is-invalid' : '' }}"
                                   placeholder="{{ _('Item Name') }}">
                            @include('alerts.feedback', ['field' => 'bitem_name'])
                        </div>

                        <div class="form-group{{ $errors->has('bitem_price') ? ' has-danger' : '' }}">
                            <label>{{ _('Price') }}</label>
                            <input type="number" name="bitem_price"
                                   class="form-control{{ $errors->has('bitem_price') ? ' is-invalid' : '' }}"
                                   placeholder="{{ _('Item Price') }}">
                            @include('alerts.feedback', ['field' => 'bitem_price'])
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
