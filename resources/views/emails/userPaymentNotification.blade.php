@extends('beautymail::templates.minty')

@section('content')

	@include('beautymail::templates.minty.contentStart')
		<tr>
            <td class="title">
                Dear Admin, {{$politicianName}} just completed payment
                <br/>
                Kindly activate. Thanks
            {{-- <h3 style="color:blue;">Name: {{ $name }}</h3>  <br/>
            <h3 style="color:blue;">Email: {{ $email }}</h3> <br>
            <h3 style="color:blue;">Phone: {{ $phone }}</h3><br> --}}
            </td>
            <br>
		</tr>
		<tr>
			<td width="100%" height="10"></td>
		</tr>
		<tr>
			<td class="paragraph">
				{{-- Message {{ $messag }} --}}
				<br/><br/><br/>
			</td>
			<td class="paragraph">
				
			</td>
		</tr>
		<tr>
			<td width="100%" height="25"></td>
		</tr>
		 <tr>
			
		</tr>
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