<form method="POST" action="{{  route('quiz.edit', $quiz->slug) }}" class="">
                        
    <div class="row input_row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Question <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="question" required="required" placeholder="Enter your question" class="form-control">
                    
                </div>
            </div>
        </div>
    </div>

    <div class="row input_row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Exp. Answer </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea aria-rowspan="3" name="answer" placeholder="Short answer" class="form-control"></textarea>
                </div>
            </div>
        </div>
    </div>


    <div class="row input_row">
        <div class="col-md-12">
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
                    {{ csrf_field() }}
                    <input type="hidden" name="type" value="{{ $type }}">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{ route('user.index') }}" class="btn btn-default">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</form>
<hr>