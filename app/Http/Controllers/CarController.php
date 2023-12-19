<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Country;
use App\Models\Color;
use App\Models\CarModel;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $userId = Auth::id();

        $cars = Car::where('user_id', $userId)->paginate(15);

        return view('cars.index', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        $models = CarModel::all();
        $countries = Country::all();
        $colors = Color::all();

        return view('cars.create', [
            'brands' => $brands,
            'models' => $models,
            'countries' => $countries,
            'colors' => $colors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'year' => 'required|date_format:Y-m-d',
            'fuel_type' => 'required|string',
            'door_count' => 'required|integer|min:1|max:6',
            'price' => 'required|numeric|between:1,99999999',
            'description' => 'nullable|string|min:5|max:255',
            'color_id' => 'required|exists:colors,id',
            'country_id' => 'required|exists:countries,id',
            'model_id' => 'required|exists:car_models,id',
            'brand_id' => 'required|exists:brands,id',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        $car = Car::create($validatedData);

        if ($car) {
            return redirect('/cars')->with('success', 'The car is successfully saved');
        }

        return redirect('/cars')->with('error', 'Failed to save the car. Please try again.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (auth()->user()->role != "admin") {
            return redirect('/cars')->with('error', 'You are not admin!');
        }

        $car = Car::findOrFail($id);

        $brands = Brand::all();
        $models = CarModel::all();
        $countries = Country::all();
        $colors = Color::all();

        return view('cars.edit', [
            'car' => $car,
            'brands' => $brands,
            'models' => $models,
            'countries' => $countries,
            'colors' => $colors
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (auth()->user()->role != "admin") {
            return redirect('/cars')->with('error', 'You are not admin!');
        }

        $validatedData = $request->validate([
            'year' => 'required|date_format:Y-m-d',
            'fuel_type' => 'required|string',
            'door_count' => 'required|integer|min:1|max:6',
            'price' => 'required|numeric|between:1,99999999',
            'description' => 'nullable|string|min:5|max:255',
            'color_id' => 'required|exists:colors,id',
            'country_id' => 'required|exists:countries,id',
            'model_id' => 'required|exists:car_models,id',
            'brand_id' => 'required|exists:brands,id',
        ]);

        Car::whereId($id)->update($validatedData);

        return redirect('/cars')->with('success', 'Car data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->user()->role != "admin") {
            return redirect('/cars')->with('error', 'You are not admin!');
        }

        $car = Car::findOrFail($id);

        $car->delete();

        return redirect('/cars')->with('success', 'Car data is successfully deleted');
    }
}
