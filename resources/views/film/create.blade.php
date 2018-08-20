@extends('layouts.app')
    
    @section('title') Create Film! @endsection

    @section('content')
        <div id="content">
            <div class="row">
		        <div class="col-md-6">
		            <h2>Add New Film</h2>
		            <form action="{{ url('films') }}" method="post" enctype="multipart/form-data">
		            	<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
		                    <label for="Name">Name</label>
		                    <input class="form-control" type="text" name="name" id="name" value="{{ Request::old('name') }}"></input>
		                </div>
		                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
		                	<label for="Description">Description</label>
		                    <textarea class="form-control" type="text" name="description" id="description" value="{{ Request::old('description') }}"></textarea>
		                </div>
		                <div class="form-group {{ $errors->has('release-date') ? 'has-error' : '' }}">
		                    <label for="Release Date">Release Date</label>
		                    <input class="form-control" type="text" name="release_date" id="release-date" value="{{ Request::old('release-date') }}"></input>
		                </div>
		                <div class="form-group {{ $errors->has('rating') ? 'has-error' : '' }}">
		                    <label for="rating">Rating</label>
		                    <input class="form-control" type="number" min="1" max="5" name="rating" id="rating" value="{{ Request::old('rating') }}"></input>
		                </div>
		                <div class="form-group {{ $errors->has('ticket-price') ? 'has-error' : '' }}">
		                    <label for="ticket price">Ticket Price</label>
		                    <input class="form-control" type="text" name="ticket_price" id="ticket-price" value="{{ Request::old('ticket_price') }}"></input>
		                </div>
		                <div class="form-group {{ $errors->has('country') ? 'has-error' : '' }}">
		                    <label for="country">Country</label>
		                    <input class="form-control" type="text" name="country" id="country" value="{{ Request::old('country') }}"></input>
		                </div>
		                <div class="form-group {{ $errors->has('genre') ? 'has-error' : '' }}">
		                    <label for="coungenretry">Genre</label>
		                    <input class="form-control" type="text" name="genre" placeholder="Comma separated list of Genres" id="genre" value="{{ Request::old('genre') }}"></input>
		                </div>

		                <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
		                    <label for="photo">Photo</label>
		                    <input class="form-control" type="file" name="photo"></input>
		                </div>
		                
		                <input type="hidden" name="_token" value="{{ Session::token() }}"></input>
		                <button type="submit" class="btn btn-primary">Submit</button>
		            </form>
		        </div>
		     </div>
        </div>
    @endsection