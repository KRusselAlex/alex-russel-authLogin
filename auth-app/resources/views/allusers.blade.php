<x-app>
    <x-slot:title>
        allusers
    </x-slot:title>
    <div class="flex justify-center mx-auto h-screen">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table
                            class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                            <thead
                                class="border-b border-neutral-200 font-medium dark:border-white/10">
                                <tr>
                                    <th scope="col" class="px-6 py-4">#</th>
                                    <th scope="col" class="px-6 py-4">name</th>
                                    <th scope="col" class="px-6 py-4">email</th>
                                    <th scope="col" class="px-6 py-4">method</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($datas as $data)
                                <tr class="border-b border-neutral-200 dark:border-white/10" >
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $data->id }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $data->name }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $data->email }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $data->method }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>