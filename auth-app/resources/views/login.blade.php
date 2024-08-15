<x-app>
    <x-slot:title>
        Login
    </x-slot:title>

    <div class="p-10">
        <h1 class="mb-8 font-extrabold text-3xl">Login</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <form method="POST"  action="/auth-login">
            @csrf
            <div class="mt-4">
                    <label class="block font-semibold" for="email">Email</label>
                    <input class="w-full shadow-inner bg-gray-100 rounded-lg placeholder-black text-2xl p-4 border-none block mt-1 w-full" id="email" type="email" name="email" required="required" placeholder="email"
                        value="{{ old('email') }}">
                    @if ($errors->has('email'))
                    <span class="text-red-500 text-sm">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="mt-4">
                    <label class="block font-semibold" for="password">Password</label>
                    <input class="w-full shadow-inner bg-gray-100 rounded-lg placeholder-black text-2xl p-4 border-none block mt-1 w-full" id="password" type="password" name="password" required="required" autocomplete="new-password" placeholder="*********" value="{{ old('password') }}">
                    @if ($errors->has('password'))
                    <span class="text-red-500 text-sm">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="flex items-center justify-between mt-8">
                    <button type="submit" class="flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">Login</button>
                    <a class="font-semibold" href="{{ route('register') }}">
                        no account?
                    </a>
                </div>
            </form>

            <aside class="">
                <div class="bg-gray-100 p-8 rounded">
                    <h2 class="font-bold text-2xl">Login with social</h2>
                    <ul class="list-disc mt-4 list-inside">
                        <li><a href="{{ route('social-redirect', 'facebook') }}">Facebook</a></li>
                        <li><a href="{{ route('social-redirect','google') }}">Google</a></li>
                        <li><a href="{{ route('social-redirect','github') }}">Github</a></li>
                        <li><a href="{{ route('social-redirect','linkedin-openid') }}">LinkedIn</a></li>
                    </ul>
                </div>
            </aside>

        </div>
    </div>


    

</x-app>