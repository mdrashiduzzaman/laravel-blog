@extends('layouts.app')
@section('content')
<div class="container">
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">s.l</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Subject</th>
      <th scope="col">Message</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($contactmessage as $con_message)
    <tr class={{ ($con_message->read_status == 1)?"bg-warning":"" }}>
      <th scope="row">{{$loop->index}}</th>
      <td>{{ $con_message->first_name }}</td>
      <td>{{ $con_message->last_name }}</td>
      <td>{{ $con_message->subject }}</td>
      <td>{{ $con_message->message }}</td>
      <td>
      	<div class="btn-group" role="group">
		    <a class="btn btn-sm btn-info" href="#">reply</a>
		    <a class="btn btn-sm btn-danger" href="#">Del</a>
		</div>
      </td>
    </tr>
   @endforeach
  </tbody>
</table>
</div>
@endsection