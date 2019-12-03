@extends('layouts.app')

@section('content')
<section class="hero is-light is-fullheight-with-navbar">
    <div class="hero-body">
            <div class="container">
                    <div class="has-padding-bottom-20">
                        <h1 class="is-size-1">Login</h1>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="field">
                            <p class="control has-icons-left">
                                <input id="email" type="email" placeholder="Email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <span class="icon is-small is-left">
                                <i class="fas fa-envelope"></i>
                                </span>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </p>
                        </div>

                        <div class="field">
                            <p class="control has-icons-left">
                                <input id="password" class="input  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" type="password" placeholder="Password">
                                <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                                </span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </p>
                        </div>

                        
                        <div class="field">
                            <p class="control">
                                <button class="button is-primary" type="submit">
                                        {{ __('Login') }}
                                </button>
                                {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
