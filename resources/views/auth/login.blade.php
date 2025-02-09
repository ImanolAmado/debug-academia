<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

<body>
    <div id="login">       
        <div class="container">             
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" method="post" action="{{ route('login') }}">
                            @csrf
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">                               
                                <label for="email" :value="__('Email')" class="text-info" :value="old('email')" required autofocus autocomplete="username">Email</label><br>
                                <input type="email" name="email" id="email" class="form-control">
                                <x-input-error :messages="$errors->get('email')" class="mt-2"  />
                            </div>
                            <div class="form-group">
                                <label for="password" :value="__('Password')" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" required autocomplete="current-password" class="form-control">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <div class="form-group">                             
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Entrar">
                            </div>                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</x-guest-layout>
