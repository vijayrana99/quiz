@extends('backend.layouts.default')

@section('page_title', 'Manage Roles')

@section('style')
@stop

@section('content')

@if(! Auth::user()->can('manage_role'))
    @include('errors.401')
@else
    <div class="x_panel">
        <div class="x_title">
            <h2>
                Manage Roles
            </h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Role</th>
                            <th>Permissions</th>
                            <th>Operations</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{ (($roles->currentPage() - 1 ) * $roles->perPage() ) + $loop->iteration }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                            {{  $role->permissions()->pluck('name')->implode(', ') }}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                            </td>
                            <td>
                                <a href="{{ route('role.edit', $role->id) }}" class="btn btn-sm btn-info action_btn" style="margin-right: 3px;">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
                @if($roles->total() != 0)
                    <div>Showing
                        {{ ($roles->currentpage()-1) * $roles->perpage()+1}} to
                        {{(($roles->currentpage()-1) * $roles->perpage())+$roles->count()}} of
                        {{$roles->total()}} records
                    </div>

                    {{ $roles->links() }}
                @else
                    No records found.
                @endif
            </div>

        </div>
    </div>

@endif

@stop