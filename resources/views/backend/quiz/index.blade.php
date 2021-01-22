@extends('backend.layouts.default')

@section('page_title', 'Listing Quizs')

@section('style')
<style>
.invite_btn { width: 100%; }
</style>
@stop

@section('content')


<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Listing Quizs</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                @include('backend.partials.error')

                <form method="post" action="{{ route('quiz.index') }}" class="form-inline">
                    
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
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>View</th>
                            <th>Add Questions</th>
                            <th>Share Options</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quizs as $key => $quiz)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{ $quiz->name }}</td>
                                <td>
                                    <a href="{{ route('quiz.edit', $quiz->slug) }}" class="btn btn-sm btn-info">View Quiz</a> 
                                </td>
                                <td>
                                       
                                    <a href="{{ route('quiz.edit', [$quiz->slug, 'type' => 'choice']) }}" class="btn btn-sm btn-success">Multiple Choice</a>    
                                    <a href="{{ route('quiz.edit', [$quiz->slug, 'type' => 'checkbox']) }}" class="btn btn-sm btn-success">Checkbox</a>    
                                    <a href="{{ route('quiz.edit', [$quiz->slug, 'type' => 'answer']) }}" class="btn btn-sm btn-success">Answer</a>
                                </td>
                                <th>
                                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target=".bs-example-modal-sm">Invite by Email</button>
                                    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel2">Invite by Email</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="{{ route('quiz.invite', $quiz->slug) }}" class="form-label-left input_mask">

                                                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                                                            <input type="email" name="email" required="" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Email">
                                                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                                        </div>
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-sm btn-success pull-center invite_btn">Invite</button>
                
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /modals -->

                                    {{-- <a href="https://twitter.com/intent/tweet?{{ route('quiz.invite', $quiz->slug) }}" class="social-share twitter btn btn-sm btn-success">Share on Twitter</a>     --}}
                                    <a class="social-share twitter btn btn-sm btn-success">Share on Twitter</a>

                                
                                </th>
                                <td>
                                    <form action="{{ route('quiz.destroy') }}" method="POST"
                                        onsubmit="return confirm('Delete this record?');">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ $quiz->id }}" />
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button type="submit" name="Delete" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
</div>

@stop

@section('script')
<script>

setShareLinks();

function socialWindow(url) {
  var left = (screen.width - 570) / 2;
  var top = (screen.height - 570) / 2;
  var params = "menubar=no,toolbar=no,status=no,width=570,height=570,top=" + top + ",left=" + left;
  // Setting 'params' to an empty string will launch
  // content in a new tab or window rather than a pop-up.
  // params = "";
  window.open(url,"NewWindow",params);
}

function setShareLinks() {
  var pageUrl = encodeURIComponent(document.URL);
  var tweet = encodeURIComponent($("meta[property='og:description']").attr("content"));

  $(".social-share.twitter").on("click", function() {
    url = "https://twitter.com/intent/tweet?url=" + pageUrl + "&text=" + tweet;
    socialWindow(url);
  });
}  
</script>
@stop