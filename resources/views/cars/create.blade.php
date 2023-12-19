<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Car') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <section class="bg-white max-w-3xl mx-auto rounded-md shadow-sm">
            <div class="py-8 px-4 mx-auto max-w-2xl lg:py-10">
                @if ($errors->any())
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <ul class="pl-3 space-y-2">
                        @foreach ($errors->all() as $error)
                        <li class="list-disc">
                            {{ $error }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new car</h2>

                <form method="post" action="{{ route('cars.store') }}">
                    @csrf
                    <div class=" grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div>
                            <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
                            <select id="brand" name="brand_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="" selected hidden>Select brand</option>
                                @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="model" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Model</label>
                            <select id="model" name="model_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="" selected hidden>Select model</option>
                                @foreach($models as $model)
                                <option value="{{ $model->id }}">{{ $model->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Production year</label>
                            <input type="date" value="{{ now()->format('Y-m-d') }}" name="year" id="year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>

                        <div>
                            <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country</label>
                            <select id="country_id" name="country_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="" selected hidden>Select country</option>
                                @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="fuel-type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fuel Type</label>
                            <select id="fuel-type" name="fuel_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="" selected hidden>Select fuel type</option>
                                <option value="hybrid">hybrid</option>
                                <option value="gas">gas</option>
                                <option value="diesel">diesel</option>
                                <option value="electric">electric</option>
                            </select>
                        </div>

                        <div>
                            <label for="color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Color</label>
                            <select id="color" name="color_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="" selected hidden>Select color</option>
                                @foreach($colors as $color)
                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="door-count" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Door count</label>
                            <input type="number" name="door_count" id="door-count" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="5">
                        </div>

                        <div>
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                            <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="20,203.23">
                        </div>

                        <div class="sm:col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your description here"></textarea>
                        </div>
                    </div>

                    <button type="submit" class="inline-flex items-center px-5 py-2 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-600 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                        Save
                    </button>
                </form>
            </div>
        </section>
    </div>
</x-app-layout>