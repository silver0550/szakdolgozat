<div class='login'>
    <div class='head'>
        <h1 class='company'>Corporation Name/logo</h1>
        </div>
        <p class='msg'>Welcome back</p>
        <div class='form'>
          <form wire:submit.prevent='login'>
            @csrf
            <input wire:model.lazy='email' type="text" placeholder='Email' class='text' /><br>
            <input wire:model.lazy='password' type="password" placeholder='••••••••••••••' class='password' /><br>
            <input type="submit" class='btn-login' value="Login">
            <a href="#" class='forgot'>Forgot?</a>
            @if ($errors->any())
                <div class='error-msg'>{{$errors->first()}}</div>
            @endif
          </form>
        </div>
</div>