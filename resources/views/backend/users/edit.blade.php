@extends('backend.layouts.default')

@section('page_title', 'Edit User')

@section('style')
@stop

@section('content')

@if( ! Auth::user()->can('manage_user'))
    @include('errors.401')
@else
    <div class="x_panel">
        <div class="x_title">
            <h2>Update User</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            @include('backend.partials.error')

                <div class="x_panel">
                    
                    <div class="x_content">
                        <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">General Setting</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="permission-tab" data-toggle="tab" href="#permission" role="tab" aria-controls="permission" aria-selected="false">Permissions Setting</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                                <form action="{{ route('user.update', $user->id) }}" method="post" class="form-horizontal">
                                    <input type="hidden" name="_method" value="put" />
                                    
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-2 col-sm-2 label-align" for="name">Name <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" name="name" value="{{ $user->name }}" id="name"  required="required" class="form-control ">
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-2 col-sm-2 label-align">Email <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" name="email" value="{{ $user->email }}" id="email"  required="required" class="form-control ">
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-2 col-sm-2 label-align">Role <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            @foreach ($roles as $role)
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio"
                                                        value="{{ $role->id }}" name="roles"  {{ ($role->id == $user->roles[0]->id) ? 'checked' : '' }}> {{ ucfirst($role->name) }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
        
                                    <div class="item form-group">
                                        <label class="control-label col-md-2 col-sm-2 col-xs-12">User Password</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="password" name="password" placeholder="Enter user's new password or leave blank" class="form-control">
                                        </div>
                                    </div>
        
                                    <div class="item form-group">
                                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Admin Password <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="password" name="admin_password" required="required" placeholder="Enter your password to save changes" class="form-control">
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-success">Submit</button>
                                            <a href="{{ route('user.index') }}" class="btn btn-default">Cancel</a>
                                        </div>
                                    </div>
                                </form>                                
                            </div>
                            <div class="tab-pane fade" id="permission" role="tabpanel" aria-labelledby="permission-tab">
                                <form method="POST" action="{{ route('user-permission-update', $user->id) }}" class="form-horizontal">

                                    <div class='item form-group'>
                                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Permissions </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            @foreach ($permissions as $permission)
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                                            {{ $user->hasPermissionTo($permission->name) ? 'checked' : '' }} > {{ $permission->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Admin Password <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="password" name="admin_password" required="required" placeholder="Enter your password to save changes" class="form-control">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-success">Submit</button>
                                            <a href="{{ route('role.index') }}" class="btn btn-default">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@stop
