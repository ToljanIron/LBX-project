<?php

namespace App\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Employee;

interface EmployeeServiceContract
{
    public function getEmployees(int $count);
    /**
     * @param $id
     * @return Employee|null
     */
    public function show($id): ?Employee;
    /**
     * @param $id
     * @return bool
     */
    public function delete($id): bool;
}
