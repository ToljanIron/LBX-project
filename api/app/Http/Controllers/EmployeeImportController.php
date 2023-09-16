<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeImportRequest;
use App\Http\Response\ApiResponse;
use App\Jobs\EmployeeImportJob;

class EmployeeImportController extends Controller
{
    public function import(EmployeeImportRequest $employeeImportRequest)
    {
        $file = $employeeImportRequest->file('file');

        $path = $file->store('import');

        EmployeeImportJob::dispatch($path);

        return new ApiResponse('Employee import job queued');
    }
}
