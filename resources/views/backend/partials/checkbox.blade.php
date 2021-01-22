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
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Option 1 </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="options[]" placeholder="Option 1" class="form-control">
                </div>
            </div>
        </div>
    </div>

    <div class="row input_row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Option 2 </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="options[]" placeholder="Option 2 " class="form-control">
                    
                </div>
            </div>
        </div>
    </div>

    <div class="row input_row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Option 3 </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="options[]" placeholder="Option 3 " class="form-control">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="row input_row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Option 4 </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="options[]" placeholder="Option 4 " class="form-control">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="row input_row">
        <div class="col-md-12">
            <div class='form-group'>
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Correct Answer <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="0" name="answer[]" id="option1"> <label for="option1">Option 1</label> &nbsp; &nbsp;
                            <input type="checkbox" value="1" name="answer[]" id="option2"> <label for="option2">Option 2</label> &nbsp; &nbsp;
                            <input type="checkbox" value="2" name="answer[]" id="option3"> <label for="option3">Option 3</label> &nbsp; &nbsp;
                            <input type="checkbox" value="3" name="answer[]" id="option4"> <label for="option4">Option 4</label> &nbsp; &nbsp;
                        </label>
                    </div>
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
                    <input type="hidden" name="type" value="{{ $type }}">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{ route('user.index') }}" class="btn btn-default">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</form>