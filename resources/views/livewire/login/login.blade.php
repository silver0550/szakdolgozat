<div>
    <div class="text-center">
        <h1>Corporation Name/logo</h1>
        <p>Welcome back</p>
    </div>        
    <div>   
        <form wire:submit.prevent='login' class="flex flex-col gap-4">
            <x-input.form-control label="Email cím" for="emil" :error="$errors->first('email')">
                <x-input.text wire:model.defer='email' name="email" id="email" :error="$errors->first('email')"/>
            </x-input.form-control>
            <x-input.form-control label="Jelszó" for="password" :error="$errors->first('password')">
                <x-input.text wire:model.defer='password' password for="email" :error="$errors->first('password')"/>  
            </x-input.form-control>
            <div class="mt-5" >
                <x-button.primary>Login</x-button>
                <a class="float-right mt-3" href="#">Forgot?</a>
            </div>
        </form>
        @error('auth')
            <div class="text-center">
                <span class="text-error text-center">{{$message}}</span>
            </div>
        @enderror
    </div>
</div>