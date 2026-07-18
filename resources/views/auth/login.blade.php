@extends('layouts.sign')
@section('title', 'Login')
@section('content')
    <div class="kt-card max-w-[370px] w-full">
        <form method="POST" action="{{ route('login') }}" class="kt-card-content flex flex-col gap-5 p-10">
            @csrf
            <div class="text-center mb-2.5">
                <h3 class="text-lg font-medium text-mono leading-none mb-2.5">
                    Sign in
                </h3>
                @if (count($errors) > 0)
                    <div class="space-y-2.5">
                        <div class="kt-alert" role="alert" aria-labelledby="alert_heading"
                            aria-describedby="alert_message" id="alert">
                            <div class="kt-alert-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-triangle-alert size-6 text-destructive" aria-hidden="true">
                                    <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3">
                                    </path>
                                    <path d="M12 9v4"></path>
                                    <path d="M12 17h.01"></path>
                                </svg>
                            </div>
                            <div class="kt-alert-content">
                                <p class="kt-alert-description" id="alert_message">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}<br />
                                    @endforeach
                                </p>
                            </div>
                            <div class="kt-alert-tooltip">
                                <button class="kt-alert-close" data-kt-dismiss="#alert" data-kt-dismiss-mode="hide"
                                    aria-label="Close alert">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"
                                        aria-hidden="true">
                                        <path d="M18 6 6 18"></path>
                                        <path d="m6 6 12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <button type="button" class="kt-btn hidden" id="alert_restore" aria-controls="alert"
                            aria-expanded="false">
                            Display back
                        </button>
                    </div>
                @endif

            </div>
            <div class="flex flex-col gap-2">
                <label class="kt-form-label font-normal text-mono">
                    Email
                </label>
                <input class="kt-input" placeholder="Enter Email" type="email" name="email" value="" required />
            </div>
            <div class="flex flex-col gap-2">
                <div class="flex items-center justify-between gap-1">
                    <label class="kt-form-label font-normal text-mono">
                        Password
                    </label>
                </div>
                <div class="kt-input" data-kt-toggle-password="true">
                    <input name="password" placeholder="Enter Password" type="password" value="" />
                    <button class="kt-btn kt-btn-sm kt-btn-ghost kt-btn-icon bg-transparent! -me-1.5"
                        data-kt-toggle-password-trigger="true" type="button">
                        <span class="kt-toggle-password-active:hidden">
                            <i class="ki-filled ki-eye text-muted-foreground">
                            </i>
                        </span>
                        <span class="hidden kt-toggle-password-active:block">
                            <i class="ki-filled ki-eye-slash text-muted-foreground">
                            </i>
                        </span>
                    </button>
                </div>
            </div>
            <div class="flex justify-end">
                <a class="text-sm kt-link" href="#">
                    Forgot Password?
                </a>
            </div>
            <button class="kt-btn kt-btn-primary flex justify-center grow">
                Sign In
            </button>
        </form>
    </div>
@stop
