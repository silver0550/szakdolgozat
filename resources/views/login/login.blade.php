<!DOCTYPE html>
<html lang="hu" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  
  <link rel="stylesheet" href="/css/login.css">

</head>
<body>
<section class='login'>
  <div class='head'>
  <h1 class='company'>Corporation Name/logo</h1>
  </div>
  <p class='msg'>Welcome back</p>
  <div class='form'>
    <form action={{route('login')}} method="POST">
      @csrf
      <input type="text" placeholder='Username' class='text' name="email" required><br>
      <input type="password" placeholder='••••••••••••••' class='password' name="password" required><br>
      <input type="submit" class='btn-login' value="Login">
      <a href="#" class='forgot'>Forgot?</a>
      @isset($massage)
          <p class = 'error'>{{$massage}}</p>
      @endisset
    </form>
  </div>
</section>

</body>
</html>
