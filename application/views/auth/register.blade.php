@extends('templates/layout')

@section('content')
    <form action="<?= base_url('register') ?>" method="post">
        <div class="flex flex-col gap-2 max-w-md mx-auto mt-28">
            <h1 class="font-bold uppercase text-4xl mb-2 text-center">Register Page</h1>
            <label class="input input-bordered flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
                    <path
                        d="M8 6L21 6.00078M8 12L21 12.0008M8 18L21 18.0007M3 6.5H4V5.5H3V6.5ZM3 12.5H4V11.5H3V12.5ZM3 18.5H4V17.5H3V18.5Z"
                        stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <input type="text" class="grow" placeholder="Username" name="username" />
            </label>
            <label class="input input-bordered flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
                    <path fill-rule="evenodd"
                        d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
                        clip-rule="evenodd" />
                </svg>
                <input type="password" class="grow" placeholder="********" name="password" />
            </label>
            <button type="submit" class="btn btn-primary">Register</button>
            <div class="mx-auto">
                <p>
                    <small>Sudah punya akun? <a href="<?= base_url('login') ?>"
                            class="underline text-blue-500">Masuk</a>.</small>
                </p>
            </div>
        </div>
    </form>
@endsection