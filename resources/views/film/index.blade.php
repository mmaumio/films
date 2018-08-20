@extends('layouts.app')
    
    @section('title') Film @endsection

    @section('content')
        <div id="content">
            <p>
            	<a href="{{ URL::to('films/create') }}" class="btn btn-success">Add Film</a>
            </p>
            <table class="table">
		        <thead>
		            <tr>
		                <th>Name</th>
		                <th>Description</th>
		                <th>Photo</th>
		                <th>Release Date</th>
		                <th>Rating</th>
		                <th>Ticket Price</th>
		                <th>Country</th>
		                <th>Genre</th>
		            </tr>
		        </thead>
		        <tbody>
		            @if ( ! empty( $films ) )
		                @foreach ($films as $film)
		                <tr>
		                	<td><a href="{{ URL::to('films/' . $film->slug ) }}">{{ $film->name }}</a></td>
		                    <td>{{ $film->description }}</td>
		                    <td class="account-image" width="200"><a href="#"><img src="{{ asset('images/films/' . $film->photo ) }}" alt="" class="img-responsive"></a></td>
		                    <td>{{ $film->release_date }}</td>
		                    <td>{{ $film->rating }}</td>
		                    <td>{{ $film->ticket_price }}</td>
		                    <td>{{ $film->country }}</td>
		                    <td>{{ $film->genre }}</td>
		                    <td align="right">
		                    	<form method="post" action="{{ URL::to('films/' . $film->id ) }}">
				                    <input type="hidden" name="_method" value="DELETE">
				                   	<input type="hidden" name="_token" value="{{ Session::token() }}"></input>
				                    <input class="btn btn-warning" type="submit" value="Delete">
			                    </form>
		                    </td>
		                </tr>    
		                @endforeach
		            @else    
		                <tr>
		                    <td>No Results Found</td>
		                </tr>
		            @endif
		        </tbody>
		    </table>   
        </div>
    @endsection