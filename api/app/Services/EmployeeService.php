<?php

namespace App\Services;

use App\Contracts\EmployeeServiceContract;
use App\Models\Employee;

class EmployeeService implements EmployeeServiceContract
{
    public function getEmployees(int $count)
    {
        return Employee::paginate($count);
    }

    public function show($id): ?Employee
    {
        return Employee::where('emp_id', $id)->first();
    }

    public function delete($id): bool
    {
        $employee = Employee::where('emp_id', $id)->first();

        return $employee->delete();
    }
}
