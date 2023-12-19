<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center w-full">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Cars') }}
            </h2>

            <a href="{{ route('cars.create')}}" class="text-white bg-blue-600 hover:bg-blue-700 active:scale-95 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 transition-all">Add Car</a>
        </div>
    </x-slot>

    <div class="py-12 space-y-5">
        @if(session()->get('success'))
        <div class="p-4 mb-4 text-sm max-w-7xl mx-auto text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
            {{ session()->get('success') }}
        </div>
        @endif

        @if(session()->get('error'))
        <div class="p-4 mb-4 text-sm max-w-7xl mx-auto text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
            {{ session()->get('error') }}
        </div>
        @endif

        <div class="overflow-x-auto shadow-sm sm:rounded-lg bg-white max-w-7xl mx-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-5 py-3">
                            Brand
                        </th>
                        <th class="px-5 py-3">
                            Model
                        </th>
                        <th class="px-5 py-3">
                            Fuel Type
                        </th>
                        <th class="px-5 py-3">
                            Year
                        </th>
                        <th class="px-5 py-3">
                            Country
                        </th>
                        <th class="px-5 py-3">
                            Price
                        </th>
                        <th class="px-5 py-3">
                            Color
                        </th>
                        <th class="px-5 py-3">
                            Door count
                        </th>
                        @if(Auth::user()->role == 'admin')
                        <th class="px-5 py-3 text-center" colspan="2">
                            Action
                        </th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cars as $car)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-5 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $car->brand->name }}
                        </th>
                        <td class="px-5 py-4">
                            {{ $car->model->name }}
                        </td>
                        <td class="px-5 py-4">
                            {{ $car->fuel_type }}
                        </td>
                        <td class="px-5 py-4">
                            {{ \Carbon\Carbon::parse($car->year)->format('Y') }}
                        </td>
                        <td class="px-5 py-4">
                            {{ $car->country->name }}
                        </td>
                        <td class="px-5 py-4">
                            ${{ number_format($car->price, 2, '.', ',') }}
                        </td>
                        <td class="px-5 py-4">
                            {{ $car->color->name }}
                        </td>
                        <td class="px-5 py-4">
                            {{ $car->door_count }}
                        </td>
                        @if(Auth::user()->role == 'admin')
                        <td class="pl-5 py-3">
                            <a href="{{ route('cars.edit', $car->id) }}" class="text-white bg-blue-600 hover:bg-blue-700 active:scale-95 focus:ring-blue-300 font-medium rounded-lg text-sm h-9 w-9 transition-all flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                </svg>
                            </a>
                        </td>
                        <td class="pr-5 py-3">

                            <form action="{{ route('cars.destroy', $car->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <button class="text-white bg-red-600 hover:bg-red-700 active:scale-95 focus:ring-blue-300 font-medium rounded-lg text-sm h-9 w-9 transition-all flex justify-center items-center" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>

                            </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <tfoot>
                <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 px-4 py-3" aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                        Showing
                        <span class="font-semibold text-gray-900 dark:text-white">{{ $cars->firstItem() }}-{{ $cars->lastItem() }}</span>
                        of
                        <span class="font-semibold text-gray-900 dark:text-white">{{ $cars->total() }}</span>
                    </span>

                    {{ $cars->links() }}
                </nav>
            </tfoot>

        </div>
    </div>
</x-app-layout>