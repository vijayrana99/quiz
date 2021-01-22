@extends('backend.layouts.default')

@section('page_title', 'Manage Quiz')

@section('style')
<style>

</style>
@stop

@section('content')

@if( ! Auth::user()->can('manage_quiz'))
    @include('errors.401')
@else
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Quiz Name:<strong> {{ $quiz->name }}</strong></h2>
                    <div class="row input_row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{-- <label class="control-label col-md-2 col-sm-2 col-xs-12"> Add Question </label> --}}
                                <div class="col-md-6 col-sm-6 col-xs-12 float-right">
                                    <p>
                                        <a href="{{ route('quiz.edit', [$quiz->slug, 'type' => 'choice']) }}" class="btn btn-success">Multiple Choice</a>    
                                        <a href="{{ route('quiz.edit', [$quiz->slug, 'type' => 'checkbox']) }}" class="btn btn-success">Checkbox</a>    
                                        <a href="{{ route('quiz.edit', [$quiz->slug, 'type' => 'answer']) }}" class="btn btn-success">Answer</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    
                    @include('backend.partials.error')
                    
                    @if($type == 'choice')       
                        @include('backend.partials.choice')
                    @elseif ($type == 'checkbox')
                        @include('backend.partials.checkbox')
                    @elseif ($type == 'answer')
                        @include('backend.partials.answer')
                    @endif
                    <h2><strong>Questions</strong></h2>
                    <hr>
                    @foreach ($questions as $question)
                        
                        <div class="row input_row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Questions </label>
                                    <div class="col-md-10 col-sm-10 col-xs-10">
                                        {{ $question->question }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row input_row">
                            <div class="col-md-12">
                                <div class='form-group'>
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">@if ($question->type == 'answer') Answer @else Options @endif</label>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                        @if ($question->type == 'choice')
                                            <div class="radio">
                                                <label>
                                                    @foreach ($question->options as $key => $option)
                                                        <input type="radio" value="{{ $key }}" @if($option->is_right_option == 1) checked="checked" @endif name="answer"> {{ $option->option }}  &nbsp; &nbsp;
                                                    @endforeach
                                                </label>
                                            </div>
                                        @elseif ($question->type == 'checkbox')
                                            <div class="checkbox">
                                                <label>
                                                    @foreach ($question->options as $key => $option)
                                                        <input type="checkbox" value="{{ $key }}" @if($option->is_right_option == 1) checked="checked" @endif name="answer"> {{ $option->option }}  &nbsp; &nbsp;
                                                    @endforeach
                                                </label>
                                            </div>
                                        @elseif ($question->type == 'answer')
                                            <label>@if (isset($question->option[0]))
                                                {{ $question->options[0]->option }}
                                            @endif</label>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
            
    @endif

@stop