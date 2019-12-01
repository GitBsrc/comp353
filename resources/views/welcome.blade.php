@extends('layouts.app')

@section('content')
<section class="hero is-light is-fullheight-with-navbar">
    <div class="hero-body">
        <div class="container columns is-vcentered">
            <h1 class="subtitle column">
                Share is a social media platform that allows you to connect with your close friends and family. You can share events, pictures and various different posts with you're loved ones or just connect with them individually.
            </h1>
            <div class="column">
                <div class="has-padding-bottom-20">
                    <h1 class="is-size-1">Create a New Account</h1>
                    <h3 class="is-size-3">It’s quick and easy.</h3>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="field">
                        <p class="control has-icons-left">
                            <input class="input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" id="name" type="text"  placeholder="Name" autofocus>
                            <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                            </span>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </p>
                    </div>
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
                        <p class="control has-icons-left">
                            <input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password"  placeholder="Password Confirm">
                            <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                            </span>
                        </p>
                    </div>
                    <div class="field">
                        <p class="control">
                            <button class="button is-primary" type="submit">
                                {{ __('Register') }}
                            </button>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
