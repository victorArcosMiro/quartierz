<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white mt-4 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col justify-center items-center">
                <div class="text-black text-2xl text-center mb-5">Gestión de usuarios</div>

                @if(Session::has('success'))
                    <div class="bg-green-500 text-black p-4 rounded mb-6">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white dark:bg-gray-800">
                        <thead>
                            <tr class="w-full bg-gray-200 dark:bg-gray-700">
                                <th class="py-3 px-6 text-left text-black">Id</th>
                                <th class="py-3 px-6 text-left text-black">Nombre</th>
                                <th class="py-3 px-6 text-left text-black">Email</th>
                                <th class="py-3 px-6 text-left text-black">Baneado</th>
                                <th class="py-3 px-6 text-left text-black">Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td class="py-3 px-6 text-black">{{ $loop->iteration }}</td>
                                    <td class="py-3 px-6 text-black">{{ $user->name }}</td>
                                    <td class="py-3 px-6 text-black">{{ $user->email }}</td>
                                    <td class="py-3 px-6 text-black">
                                        @if($user->banned)
                                            <span class="bg-red-500 text-white px-2 py-1 rounded">Yes</span>
                                        @else
                                            <span class="bg-green-500 text-white px-2 py-1 rounded">No</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-6">
                                        @if($user->banned)
                                            <a href="{{ route('user-unban', $user->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Unban</a>
                                        @else
                                            <form method="POST" action="{{ route('user-ban') }}" style="display:inline;">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $user->id }}">
                                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Banned</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
