<DOCTYPE html>
   <html lang="en-US">
     <head>
     <meta charset="utf-8">
     </head>
     <body>
     <h2>                                                                                  Hi {{$data['name']}}, we’re glad you’re here! Following are your account details: <br>
</h3>
<h3>Email: </h3><p>{{$data['email']}}</p>
<h3>Name: </h3><p>{{$data['name']}}</p>
<h3>Phone: </h3><p>{{$data['mobile']}}</p>
<h3>Password: </h3><p>{{$data['password']}}</p>
<h3>Login URL: </h3><p><a href="{{route('admission_form')}}" target="_blank">Click Here</a></p>
</body>
</html>
