@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
               
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                       
					
					@if(!isset($data))
					  <h2>Add Questionair</h2> 
					   <form class="form-horizontal" method="POST" action="{{ action('QuestionairController@save') }}">   
					@else
					  <h2>Edit Questionair</h2>  
					   <form class="form-horizontal" method="POST" action="{{ action('QuestionairController@update', $data->id) }}">  
					@endif
					 		  
                       
					   <!-- CSRF Token -->
					   <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Questionair Name</label>

                            <div class="col-md-6">
							@if(!isset($data))
							  <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
							@else
							 <input id="name" type="text" class="form-control" name="name" value="{{ $data->name }}" required autofocus>
							@endif
                               

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						
						<div class="form-group{{ $errors->has('total_questions') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Total Questions</label>

                            <div class="col-md-6">
							
								@if(!isset($data))
								 <input id="total_questions" type="text" class="form-control" name="total_questions" value="" required autofocus>
								@else
								 <input id="total_questions" type="text" class="form-control" name="total_questions" value="{{ $data->total_questions }}" required autofocus>
								@endif
                              

                                @if ($errors->has('total_questions'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('total_questions') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Duration</label>

                            <div class="col-md-6" >
							@if(!isset($data))
								<input id="duration" type="text"  name="duration" required autofocus>         
								
								@else
								<input id="duration" type="text"  name="duration" value="{{ $data->duration }}" required autofocus>
								@endif
							
								<select name="duration_type">
								<option value="mins">Minuts</option>
								<option value="hrs">Hours</option>
								</select>
                                @if ($errors->has('duration'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('duration') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

						
						
                        <div class="form-group">
                         
 						  <label class="col-md-4 control-label">Can Resume ?</label>
                            <div class="col-md-6">
                         	@if(!isset($data))
							 
								NO  <input id="is_resume" type="radio"  name="is_resume" value="0"  checked="checked">
								YES <input id="is_resume" type="radio"  name="is_resume" value="1">
								@else
								<?php   $is_resume = $data->resumable;
										$is_publish = $data->ispublish;
								 ?>
								
								
								NO  <input id="is_resume" type="radio"  name="is_resume" value="0" {{ $is_resume == '0' ? 'checked' : '' }} />
								YES <input id="is_resume" type="radio"  name="is_resume" value="1" {{ $is_resume == '1' ? 'checked' : '' }}>
								@endif
  								
								
                                @if ($errors->has('is_resume'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('is_resume') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Is Publish? </label>

                            <div class="col-md-6">
                         		@if(!isset($data))
								<select name="is_publish">
								<option value="0">No</option>
								<option value="1">Yes</option>
								</select>
								@else
								<select name="is_publish">
								<option value="0" {{ $is_publish == '0' ? 'selected' : '' }}>No</option>
								<option value="1" {{ $is_publish == '1' ? 'selected' : '' }}>Yes</option>
								</select>
								 @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                  
										
						@if(!isset($data))
						  Save Questionair
						@else
						 Update Questionair
						@endif
                                </button>
                            </div>
                        </div>
                    </form>
				 
									   
					</div>
				</div>
			</div>
		</div>
	
</div>
@endsection
