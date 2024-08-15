<x-app>
    <x-slot:title>
        editprofile
    </x-slot:title>
    <div class="flex h-screen bg-gray-100">

        <!-- sidebar -->
        <div class="hidden md:flex flex-col w-64 bg-gray-800">
            <div class="flex items-center justify-center h-16 bg-gray-900">
                <span class="text-white font-bold uppercase">{{ $data->name  }} Dashboard</span>
            </div>
            <div class="flex flex-col flex-1 overflow-y-auto">
                <nav class="flex-1 px-2 py-4 bg-gray-800">
                    <a href="/alluser" class="flex items-center px-4 py-2 text-gray-100 hover:bg-gray-700">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6 mr-2"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                strokeLinecap="round"
                                strokeLinejoin="round"
                                d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                        </svg>
                        All users
                    </a>
                    <a
                        href="/userprofile"
                        class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6 mr-2"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        editProfile
                    </a>

                    <form
                        method="POST"
                        action="/logout"
                        class="flex items-center px-4 gap-x-3 py-2 mt-2 text-gray-100 hover:bg-gray-700">
                        @csrf

                        <svg fill="#fff" height="20px" width="20px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 0 384.971 384.971" xml:space="preserve">
                            <g>
                                <g id="Sign_Out">
                                    <path d="M180.455,360.91H24.061V24.061h156.394c6.641,0,12.03-5.39,12.03-12.03s-5.39-12.03-12.03-12.03H12.03
                                C5.39,0.001,0,5.39,0,12.031V372.94c0,6.641,5.39,12.03,12.03,12.03h168.424c6.641,0,12.03-5.39,12.03-12.03
                                C192.485,366.299,187.095,360.91,180.455,360.91z" />
                                    <path d="M381.481,184.088l-83.009-84.2c-4.704-4.752-12.319-4.74-17.011,0c-4.704,4.74-4.704,12.439,0,17.179l62.558,63.46H96.279
                                c-6.641,0-12.03,5.438-12.03,12.151c0,6.713,5.39,12.151,12.03,12.151h247.74l-62.558,63.46c-4.704,4.752-4.704,12.439,0,17.179
                                c4.704,4.752,12.319,4.752,17.011,0l82.997-84.2C386.113,196.588,386.161,188.756,381.481,184.088z" />
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                            </g>
                        </svg>
                        <button type="submit" class="border-none">
                            Logout

                        </button>

                    </form>



                </nav>
            </div>
        </div>

        <!-- Main content -->
        <div class="flex flex-col flex-1 overflow-y-auto">
            <div class="flex items-center justify-between h-16 bg-white border-b border-gray-200">
                <div class="flex items-center px-4">
                    <button class="text-gray-500 focus:outline-none focus:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <input class="mx-4 w-full border rounded-md px-4 py-2" type="text" placeholder="Search">
                </div>
                <div class="mr-5 pr-4">
                    <p>
                        {{ $data->name  }}
                    </p>
                </div>

            </div>
            <div class="p-4">
                <h1 class="text-2xl font-bold">Welcome to {{ $data->name  }} Page </h1>
                <p class="mt-2 text-gray-600">Raising tomorrow's leaders.</p>

                @if(session('status'))

                <div class="alert alert-success text-center text-xl text-green-500 mb-3">

                    {{ session('status') }}

                </div>

                @endif
                <div class="text-center">
                    your default password is 1234
                </div>
                <div class="flex justify-center mt-20 px-8 ">
                    <form method="POST" class="max-w-2xl" action="/editprofile">

                        @csrf

                        @method('PATCH')


                        <div class="flex flex-wrap border shadow rounded-lg p-3 bg-white">
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
                                        class="py-1.5 px-3 m-1 text-center bg-blue-700 border rounded-md text-white  hover:bg-violet-500 hover:text-gray-100 dark:text-gray-200 dark:bg-violet-700"
                                        type="submit">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>


    </div>

</x-app>