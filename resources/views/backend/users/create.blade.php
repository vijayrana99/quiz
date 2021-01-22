@extends('backend.layouts.default')

@section('page_title', 'Create User')

@section('style')
@stop

@section('content')

@if( ! Auth::user()->can('manage_user'))
    @include('errors.401')
@else
    <div class="x_panel">
        <div class="x_title">
            <h2>Create User</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            @include('backend.partials.error')
            
            <form method="POST" action="{{ route('user.store') }}" class="">
                
                <div class="row input_row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Name <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="name" required="required" placeholder="Name" class="form-control col-md-8 col-xs-12">
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row input_row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Email <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="email" name="email" required="required" placeholder="Email" class="form-control col-md-8 col-xs-12">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row input_row">
                    <div class="col-md-12">
                        <div class='form-group'>
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Role <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                @foreach ($roles as $role)
                                    <div class="radio">
                                        <label>
                                            <input type="radio" value="{{ $role->id }}" {{$role->id == 3 ? 'checked="true"' : ''}} name="role"> {{ ucfirst($role->name) }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row input_row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Password <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" name="password" required="required" placeholder="Password" class="form-control col-md-8 col-xs-12">
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row input_row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Confirm Password <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" name="password_confirmation" required="required" placeholder="Confirm Password" class="form-control col-md-8 col-xs-12">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row input_row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a href="{{ route('user.index') }}" class="btn btn-default">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
        
    @endif

@stop