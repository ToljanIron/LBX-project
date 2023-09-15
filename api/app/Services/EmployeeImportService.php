<?php
namespace App\Services;

use App\Models\Employee;
use App\Models\ErrorRecordsEmployee;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EmployeeImportService
{
    public function importEmployeesFromCSV($filePath)
    {
        $file = Storage::disk('local')->get($filePath);

        $rows = explode("\n", $file);

        // Remove the header row if present
        $header = str_getcsv(array_shift($rows));

        $transformedHeader = array_map(function ($item) {
            return Str::slug($item, '_');
        }, $header);

        foreach (array_chunk($rows, 1000) as $chunk) {
            $data = array_map('str_getcsv', $chunk);

            foreach ($data as $row) {
                // Check if the string is empty or contains only spaces
                if (!empty($row)) {
                    if (count($transformedHeader) === count($row)) {

                        $employeeData = array_combine($transformedHeader, $row);

                        try {
                            Employee::create($employeeData);

                        } catch (QueryException $e) {
                            $errorDataString = implode(',', $row);

                            ErrorRecordsEmployee::create(['error_data' => $errorDataString]);

                            continue;
                        }
                    }
                }
            }
        }
    }
}

