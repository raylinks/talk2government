@extends('beautymail::templates.minty')

@section('content')

	@include('beautymail::templates.minty.contentStart')
		<tr>
			<td class="title">
				Hello {{$name}}
				<br>
				Email: {{$email}}
			</td>
		</tr>
		<tr>
			<td width="100%" height="10"></td>
		</tr>
		<tr>
			<td class="paragraph">
				We are pleased to receive your request to sign up on Talk2government platform.
				<br/><br/><br/>
			{{-- <input type="text" name="plan_id" value="{{$plan_id}}" style="display:none"> --}}
				PLAN: {{$plan}}<br>
				DURATION: {{$duration}}<br>
				PRICE: {{$price}}<br>
			</td>
			<td class="paragraph">
				Please,send us you bank account details for remittance of donations for your campaign.
			</td>
		</tr>
		<tr>
			<td width="100%" height="25"></td>
		</tr>
		 <tr>
			<td class="title">
				Click on the button below if you are 
				satisfied with the offer!! 
				<br>Hope to hear from you soon!!!
			</td>
		</tr>
		<tr>
			<td width="100%" height="25"></td>
		</tr>
		<tr>
			<td>
				<a href="http://talk2gov.memberkia.com/admin/pay/{{$user_id}}/{{$plan_id}}">Pay Now</a>
				{{-- @include('beautymail::templates.minty.button', ['text' => 'Pay Now', 'link' => 'http://localhost:8000/admin/pay/{{$user_id}}/{{$plan_id}}']) --}}
			</td>
		</tr>
		<tr>
			<td width="100%" height="25"></td>
		</tr>
	@include('beautymail::templates.minty.contentEnd')

@stop