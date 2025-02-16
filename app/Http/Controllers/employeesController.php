<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\employee;
use App\Models\State;
use Illuminate\Http\Request;

class employeesController extends Controller
{

    public function employeeR()
    {
        $states = State::all();
        $cities = City::all();
        return view('employees.employeesR', ['cities' => $cities, 'states' => $states]);
    }

    public function getCities($stateId)
    {
        $cities = City::where('state_id', $stateId)->get();
        return response()->json($cities);
    }


    public function registerEmployee(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'dni' => 'required|numeric|unique:employees,dni',
            'email' => 'required|min:3',
            'phone' => 'required|min:8',
            'state' => 'required|exists:states,id',
            'city' => 'required|exists:cities,id',
        ]);

        Employee::create([
            'fullname' => $request->name,
            'dni' => $request->dni,
            'email' => $request->email,
            'phone' => $request->phone,
            'departament_id' => $request->state,
            'city_id' => $request->city,
        ]);

        return redirect()->route('employeesList')->with('alerta', [
            'titulo' => '¡Éxito!',
            'mensaje' => 'Usuario Creado correctamente.',
            'icono' => 'success',
            'confirmarTexto' => 'Entendido',
            'mostrarCancelar' => false
        ]);
    }

    public function searchEmployee()
    {
        $employees = Employee::with(['departament', 'city'])->where('state', 1)->get();
        return view('employees.employeesL', ['employees' => $employees]);
    }

    public function searchEmployeeE($id)
    {
        $employee = Employee::with(['departament', 'city'])->findOrFail($id);
        $cities = City::all();
        $states = State::all();
        return view('employees.employeesE', ['employee' => $employee, 'cities' => $cities, 'states' => $states]);
    }

    public function editEmployee(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'dni' => 'required|numeric|unique:employees,dni,' . $id,
            'email' => 'required|min:3',
            'phone' => 'required|min:8',
            'state' => 'required|exists:states,id',
            'city' => 'required|exists:cities,id',
        ]);

        $employee = Employee::findOrFail($id);

        $employee->update([
            'fullname' => $request->name,
            'dni' => $request->dni,
            'email' => $request->email,
            'phone' => $request->phone,
            'departament_id' => $request->state,
            'city_id' => $request->city,
        ]);

        return redirect()->route('employeesList')->with('alerta', [
            'titulo' => '¡Éxito!',
            'mensaje' => 'Usuario Modificado correctamente.',
            'icono' => 'success',
            'confirmarTexto' => 'Entendido',
            'mostrarCancelar' => false
        ]);
    }

    public function deleteEmployee($id)
    {

        $employee = Employee::find($id);
        $employee->update(['state' => 2]);

        return redirect()->route('employeesList')->with('alerta', [
            'titulo' => '¡Éxito!',
            'mensaje' => 'Usuario Eliminado correctamente.',
            'icono' => 'success',
            'confirmarTexto' => 'Entendido',
            'mostrarCancelar' => false
        ]);
    }
}
