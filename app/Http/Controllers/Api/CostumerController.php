<?php
namespace App\Http\Controllers;

use App\Models\Costumer;
use Illuminate\Http\Request;

class CostumerController extends Controller
{
    public function index()
    {
        return Costumer::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:costumers',
            'phone' => 'required|string|max:255',
            'gps_coordinates' => 'required|string|max:255',
        ]);

        return Costumer::create($validated);
    }

    public function show($id)
    {
        return Costumer::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $costumer = Costumer::findOrFail($id);

        $validated = $request->validate([
            'full_name' => 'string|max:255',
            'email' => 'email|unique:costumers,email,'.$costumer->id,
            'phone' => 'string|max:255',
            'gps_coordinates' => 'string|max:255',
        ]);

        $costumer->update($validated);

        return $costumer;
    }

    public function destroy($id)
    {
        $costumer = Costumer::findOrFail($id);

        if ($costumer->tasks()->where('status', 'inprogress')->exists()) {
            return response()->json(['error' => 'Cannot delete costumer with active tasks.'], 400);
        }

        $costumer->delete();

        return response()->noContent();
    }
}
