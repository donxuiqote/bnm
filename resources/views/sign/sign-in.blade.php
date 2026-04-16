@extends('layouts.sign')

@section('title', 'Sign In')

@section('content')
<div class="relative p-6 bg-white dark:bg-gray-900 sm:p-0">
    <div class="flex flex-col justify-center w-full h-screen lg:flex-row">

        <!-- FORM -->
        <div class="flex flex-col flex-1 w-full lg:w-1/2">

            <div class="w-full max-w-md pt-10 mx-auto">
                <a href="/" class="text-sm text-gray-500 hover:text-gray-700">
                    ← Back to dashboard
                </a>
            </div>

            <div class="flex flex-col justify-center flex-1 w-full max-w-md mx-auto">
                <h1 class="mb-2 text-xl font-semibold text-gray-800 dark:text-white">Sign In</h1>
                <p class="mb-6 text-sm text-gray-500">Enter your email and password</p>

                <form method="POST" action="#">
                    @csrf

                    <!-- Email -->
                    <div class="mb-4">
                        <label class="block mb-1 text-sm">Email</label>
                        <input type="email" name="email"
                            class="w-full px-4 py-2 border rounded-lg dark:bg-gray-900 dark:text-white">
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label class="block mb-1 text-sm">Password</label>
                        <input type="password" name="password"
                            class="w-full px-4 py-2 border rounded-lg dark:bg-gray-900 dark:text-white">
                    </div>

                    <!-- Button -->
                    <button
                        class="w-full py-3 text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                        Sign In
                    </button>
                </form>

                <p class="mt-4 text-sm text-center">
                    Don't have an account?
                    <a href="#" class="text-blue-500">Sign Up</a>
                </p>
            </div>
        </div>

        <!-- RIGHT SIDE -->
        <div class="items-center hidden w-1/2 bg-gray-900 lg:flex">
            <div class="mx-auto text-center text-white">
                <h2 class="text-2xl font-bold">Welcome Back 👋</h2>
                <p class="text-gray-400">Login to continue</p>
            </div>
        </div>

    </div>
</div>
@endsection