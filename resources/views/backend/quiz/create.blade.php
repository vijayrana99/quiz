@extends('backend.layouts.default')

@section('page_title', 'Create Quiz')

@section('style')
<style>

</style>
@stop

@section('content')


<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Recent Quiz</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form method="post" action="{{ route('quiz.store') }}" class="form-inline">
                    
                    <form method="post" action="" class="form-inline">
                        <div class="form-group">
                            <label class="col-form-label name_label">Quiz Name</label>
                            <input type="text" name="name" class="form-control name_input" placeholder=" Enter Quiz Name">
                        </div>
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-success btn_create">Create Quiz</button>
                    </form>
                </form>
                <div class="ln_solid"></div>

                @if(empty($quizs->count()))
                    <p>No Quiz found.</p>
                @else
                    {{-- <div class="table-responsive">
                    <table class="table table-bordered table-responsive" id="">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($albums as $key => $album)
                                <tr>
                                    <th>{{ $key+1 }}</th>
                                    <td>{{ $album->name }}</td>
                                    <td>
                                        @if(Auth::user()->can('edit_category'))
                                            <a href="{{ route('update-album', $album->slug) }}" class="btn btn-sm btn-info pull-left" style="margin-right: 3px;">Edit</a>
                                        @endif
                                        @if(Auth::user()->can('delete_category'))
                                            <form action="{{ route('delete-category', $album->id) }}" method="POST"
                                                onsubmit="return confirm('Delete this record?');">
                                                {{ csrf_field() }}
                                                <button type="submit" name="Delete" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    </div> --}}
                @endif
            </div>
        </div>
    </div>
</div>
        

@stop