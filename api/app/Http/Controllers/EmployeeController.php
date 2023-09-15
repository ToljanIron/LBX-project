<?php

namespace App\Http\Controllers;

use App\Http\Response\ApiResponse;
use App\Services\EmployeeService;
use Illuminate\Http\Response;

class EmployeeController extends Controller
{
    private EmployeeService $employeeService;

    public function __construct(EmployeeService $employeeService) {
        $this->employeeService = $employeeService;
    }

    public function index(?int $count = 10)
    {
        $employees = $this->employeeService->getEmployees($count);

        if (!$employees) {

            return new ApiResponse('Employees not found', Response::HTTP_BAD_REQUEST, false);
        }

        return new ApiResponse($employees);
    }

    public function show($id)
    {
        $employee = $this->employeeService->show($id);

        if (!$employee) {

            return new ApiResponse('Employee not found', Response::HTTP_BAD_REQUEST, false);
        }

        return new ApiResponse($employee);
    }

    public function destroy($id)
    {
        $destroy = $this->employeeService->delete($id);

        if (!$destroy) {

            return new ApiResponse('Employee not found', Response::HTTP_BAD_REQUEST, false);
        }

        return new ApiResponse('Employee deleted');
    }
}
