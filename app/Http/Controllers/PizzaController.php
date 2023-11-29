<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;

use function Laravel\Prompts\error;

class PizzaController extends Controller
{
    //when we define functions in the controller we call them actions.

    public function index()
    {
        // get data from a database
        // $pizzas = Pizza::all();
        $pizzas = Pizza::orderBy('name')->get();

        // $pizzas = [
        //     ['type' => 'hawaiian', 'base' => 'cheesy crust'],
        //     ['type' => 'volcano', 'base' => 'garlic crust'],
        //     ['type' => 'veg supreme', 'base' => 'thin & crispy']
        // ];

        return view('pizzas.index', [
            'pizzas' => $pizzas,
        ]);
    }

    public function show($id)
    {
        $pizza = Pizza::findOrFail($id);
        // use the $id variable to query the db for a record
        return view('pizzas.show', ['pizza' => $pizza]);
    }

    public function create()
    {
        // use the $id variable to query the db for a record
        return view('pizzas.create');
    }

    public function store()
    {

        $pizza = new Pizza();

        $pizza->name = request('name');
        $pizza->type = request('type');
        $pizza->base = request('base');
        $pizza->toppings = request('toppings');


        error_log($pizza);
        // error_log(request('toppings'));
        // return request('toppings');
        $pizza->save();

        return redirect('/')->with('mssg', 'Thanks for your order!');
    }

    public function destroy($id)
    {
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();

        return redirect('/pizzas');
    }
}
