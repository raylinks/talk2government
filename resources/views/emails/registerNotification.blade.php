@extends('beautymail::templates.minty')

@section('content')

	@include('beautymail::templates.minty.contentStart')
		<tr>
			<td class="title">
				Hello
			</td>
		</tr>
		<tr>
			<td width="100%" height="10"></td>
		</tr>
		<tr>
			<td class="paragraph">
				A new politician with the following details has just registered on the Talk2Gov platform
				<br/><br/><br/>
				lastname: {{$lastname}}<br>
				firstname: {{$firstname}}<br>
				email: {{$email}}<br>
			</td>
		</tr>
		<tr>
			<td width="100%" height="25"></td>
		</tr>
		 <tr>
			<td class="title">
				kindly check the Admin portal to activate user. 
				Thanks!!
			</td>
		</tr>
		{{-- <tr>
			<td width="100%" height="10"></td>
		</tr>
		<tr>
			<td class="paragraph">
				More paragraph text.
			</td> 
		</tr> --}}
		<tr>
			<td width="100%" height="25"></td>
		</tr>
		<tr>
			
		</tr>
		<tr>
			<td width="100%" height="25"></td>
		</tr>
	@include('beautymail::templates.minty.contentEnd')

@stop