<x-app>
    <x-slot:title>
        editprofile
    </x-slot:title>
    <div class="flex justify-center mt-20 px-8">
        <form method="POST" class="max-w-2xl" action="/editprofile">

            @csrf

            @method('PATCH')


            <div class="flex flex-wrap border shadow rounded-lg p-3">
                <h2 class="text-xl text-gray-600  pb-2">Account settings:</h2>

                <div class="flex flex-col gap-2 w-full border-gray-400">

                    <div>

                        <label class="text-gray-600 dark:text-gray-400">User
                            name
                        </label>

                        @error('name')
                        <br>
                        <div class="error text-red-800 text-sm">{{ $message }}</div>
                        @enderror
                        <input class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow text-black type=" text" name="name" value="{{ $data->name}}">
                    </div>

                    <div>
                        <label class="text-gray-600 dark:text-gray-400">Email</label>
                        @error('email')
                        <br>
                        <div class="error text-red-800 text-sm">{{ $message }}</div>
                        @enderror
                        <input class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow text-black type=" email" name="email" value="{{ $data->email}}">
                    </div>
                    <div>
                        <label class="text-gray-600 dark:text-gray-400">Old password</label>
                        @error('oldpassword')
                        <br>
                        <div class="error text-red-800 text-sm">{{ $message }}</div>
                        @enderror
                        <input class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow text-black" name="oldpassword" type="password" value="">
                    </div>
                    <div>
                        <label class="text-gray-600 dark:text-gray-400">New password</label>
                        @error('password')
                        <br>
                        <div class="error text-red-800 text-sm">{{ $message }}</div>
                        @enderror
                        <input class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow  text-black" name="password" type="password" value="">
                    </div>
                    <div>
                        <label class="text-gray-600 dark:text-gray-400">Confirm New password</label>
                        @error('password_confirmation')
                        <br>
                        <div class="error text-red-800 text-sm">{{ $message }}</div>
                        @enderror
                        <input class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow  text-black" name="password_confirmation" type="password" value="">
                    </div>

                    <div class="flex justify-end">
                        <button
                            class="py-1.5 px-3 m-1 text-center bg-violet-700 border rounded-md text-white  hover:bg-violet-500 hover:text-gray-100 dark:text-gray-200 dark:bg-violet-700"
                            type="submit">Save changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-app>