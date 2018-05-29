 {{$error or ''}}
<form action="{{route('logined2')}}" method="post"value="{{ csrf_token() }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
<!-- 	{!! csrf_field() !!}
 -->
	<label> Username
			<input type="text" name="username" placeholder="Username">
	</label>

	<br>
	<label>Password
		<input type="password" name="password" placeholder="password">
	</label>
	
	<br> <input type="submit">
</form>
