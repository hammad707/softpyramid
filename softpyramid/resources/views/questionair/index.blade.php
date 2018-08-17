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
                       
				   <div class="col-md-6">
				  <h2>Questionair Listing</h2>
				  </div>    
				  <div class="col-md-6" style="text-align: right; margin-top: 25px;">
				  <button class="float-right"><a href="questionair/create">Add Questionair</a></button>
				  </div>  
				  <table class="table">
					<thead>
					  <tr>
						<th>id</th>
						<th>Name</th>
						<th>No. of Questions</th>
						<th>Duration</th>
						<th>Resumable</th>
						<th>Published</th>
						<th>Actions</th>
					  </tr>
					</thead>
					<tbody>
					@foreach ($data as $questionair)


					  <tr>
						<td> {{ $questionair->id }}</td>
						<td> {{ $questionair->name }}</td>
						<td> {{ $questionair->total_questions }} &nbsp; <a href="#">Add</a></td>
						<td> {{ $questionair->duration }}</td>
						<td> {{ $questionair->resumable === 1 ? "Yes" : "No" }}</td>
						<td> {{ $questionair->ispublish === 1 ? "Yes" : "No" }}</td>
						<td><a href="/questionair/edit/{{ $questionair->id }}">Edit</a> &nbsp; <a onclick="return confirm('Are you sure to delete?')"  href="/questionair/destroy/{{ $questionair->id }}">Delete</a></td>
					  </tr>
				   @endforeach
					</tbody>
				  </table>
				
									   
					</div>
				</div>
			</div>
		</div>
	
</div>
@endsection
