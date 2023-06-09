<link href="{{ asset('css/login.css') }}" rel="stylesheet">
@error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
	@error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
	@error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
	
<div class="container" id="container">

<div class="form-container sign-up-container">
		
        <form method="POST" action="{{ route('registration') }}">
        <h2>Регистрация</h2>
    @csrf
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Ваше имя') }}</label>
    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Ваше Имя" required autocomplete="name">


    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Ваш e-mail') }}</label>
    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Ваш e-mail" required autocomplete="email">


    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Придумайте пароль') }}</label>
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Ваш пароль" required autocomplete="new-password">
	<span>Пароль должен содержать латинских 6 символов, 1 заглавную букву и 1 спецсимвол</span>
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Повторите Ваш пароль" required autocomplete="new-password">
    
	

    <button type="submit" class="btn btn-primary">
        {{ __('Создать профиль') }}
    </button>
</form>
		
	</div>
	<div class="form-container sign-in-container">
		<meta name="csrf-token" content="{{ csrf_token() }}">
        
		<form method="POST" action="{{ route('login') }}">
        <h2>Вход</h2>
		  @csrf
		  
			<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Логин') }}</label>
			
			  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
			
			
		  
		  
			<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Пароль') }}</label>
			
			  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
			  @error('password')
				<span class="invalid-feedback" role="alert">
				  <strong>{{ $message }}</strong>
				</span>
			  @enderror
			
		  
		  
			   <button type="submit" class="btn btn-primary"> {{ __('Войти') }} </button>
			 @if (Route::has('password.request')) 
			<a class="btn btn-link" href="{{ route('password.request') }}"> {{ __('Forgot Your Password?') }} </a>
			 @endif 
		   
			
			
		</form>
	</div>

    <div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Есть аккаунт?</h1>
				<p>Нажмите на кнопку ниже, что бы войти.</p>
				<button class="ghost" id="signIn">Вход</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Нет аккаунта?</h1>
				<p>Зарегистрируйтесь, нажав кнопку ниже.</p>
				<button class="ghost" id="signUp">Регистрация</button>
			</div>
		</div>
	</div>
</div>
<script src="{{ asset('js/login.js') }}"></script>