<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		
		
		<!--BOOTSTRAP-->
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<!--BOOTSTRAP-->
		
		
        <title>Add guests</title>
	</head>
     <body>
	 
<div class='container'>
<?php $messages = $errors->all('<p style="color:red">:message</p>');
?>
@foreach($messages as $msg)
{!!$msg!!}
@endforeach
<div class="form-group">
    {!!Form::open(['url' => 'add_guest', 'method' => 'post'])!!}
    <div class="row">
        <div class="col-lg-6">
            {{ csrf_field() }}
			<br><br>
	
            {!!Form::label('nume','Nume')!!}
            <input type="text" name="name" value='{{old('name')}}' class='form-control'  placeholder='Introduceti text'>
			
			 {!!Form::label('email','Email')!!}
            <input type="text" name="email" value='{{old('email')}}' class='form-control'  placeholder='Introduceti text'>
			
       
			<div class="form-group">
                <label>Message:</label>
                <textarea name='message' class="form-control" rows="3">{{old('message')}}</textarea>
            </div>
			
            <button type="submit" class="btn btn-default">Adauga</button>
            <button type="reset" class="btn btn-default">Renunta</button>
		
        </div>
    </div>

    {!!Form::close()!!}
</div>
</div>	 
	 
	 @foreach($guests as $guest)
	 <div class='well'>
	 {{$guest->name}}
	 ({{$guest->email}}):
	 <br>
	 {{$guest->message}}
	 </div>
	 @endforeach
	 
	 
    </body>
</html>
