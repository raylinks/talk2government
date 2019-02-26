@extends('beautymail::templates.minty')

@section('content')

	@include('beautymail::templates.minty.contentStart')
		<tr>
			<td class="title">
                Hello {{$politicianName}}, You just recieved a mail from 
                <br/>
                Name: {{$name}} <br/>
                Email: {{$email}}
				<br>
				
			</td>
		</tr>
		<tr>
            <td width="100%" height="10"></td>
            <td> Message: {{ $subject }} </td>
            {{-- {{$message}} --}}
        <td> Message: {{ $messag }} </td>
		</tr>
		<tr>
			<td class="paragraph">
               
				Your tracking number is {{$tracking}}
				<br/><br/><br/>
			</td>
			<td class="paragraph">
				
			</td>
		</tr>
		
	@include('beautymail::templates.minty.contentEnd')

@stop