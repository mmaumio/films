@extends('layouts.app')
    
    @section('title') Film! @endsection

    @section('content')
        <div id="content">
            <div class="row">
		        <div class="section col-md-8">
		            <h2>{{ $film->name }}</h2>
		            <p>{{ $film->description }}</p>
		            <p>Release: {{ $film->release_date }}</p>
		            <p>Rating: {{ $film->rating }}</p>
		            <p>Ticket: {{ $film->ticket_price }}</p>
		            <p>Country: {{ $film->country }}</p>
		            <p>Genre: {{ $film->genre }}</p>
		        </div>
		    </div>
		    <div class="row">    
		        @if (Auth::check())
		        <div class="section col-md-6">

		            <h2>Add Comment</h2>
		            <form action="{{ url('films/comment') }}" method="post">
		            	<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
		                    <label for="Name">Name</label>
		                    <input class="form-control" type="text" name="name" id="name" value="{{ Auth::user()->name }}"></input>
		                </div>
		                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
		                	<label for="Email">Email</label>
		                	<input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}"></input>
		                    
		                </div>
		                <div class="form-group {{ $errors->has('release-date') ? 'has-error' : '' }}">
		                    <label for="Comment">Comment</label>
		                    <textarea class="form-control" name="comment" id="comment">{{ Request::old('comment') }}</textarea>
		                </div>
		                
		                <input type="hidden" name="film_id" value="{{ $film->id }}">
		                <input type="hidden" name="_token" value="{{ Session::token() }}"></input>
		                <button type="submit" class="btn btn-primary">Submit</button>
		            </form>
		
		        </div>
			</div>  
			<div class="row">      
		        <div class="section col-md-8">
		        	@foreach ( $comments as $comment )

		        		<h3>Author: {{ $comment->name }}</h3>
		        		<p>Comment: {{ $comment->comment }}</p>

		        	@endforeach
		        </div>
		        @else 
		        	<p>You have to login to comment</p>
		        @endif	
		    </div>
        </div>
    @endsection