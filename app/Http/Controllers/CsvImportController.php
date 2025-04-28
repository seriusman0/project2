<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CsvImportController extends Controller
{
    public function showForm()
    {
        return view('admin.csv-import.form');
    }

    public function import(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt|max:2048',
            'type' => 'required|in:attendance,students',
        ]);

        $path = $request->file('csv_file')->getRealPath();
        $file = fopen($path, 'r');
        $header = fgetcsv($file);

        if (!$header) {
            return back()->withErrors(['csv_file' => 'CSV file is empty or invalid.']);
        }

        $rows = [];
        while (($row = fgetcsv($file)) !== false) {
            $rows[] = array_combine($header, $row);
        }
        fclose($file);

        if ($request->type === 'attendance') {
            $this->importAttendance($rows);
        } elseif ($request->type === 'students') {
            $this->importStudents($rows);
        }

        return redirect()->route('admin.dashboard')->with('success', 'CSV data imported successfully.');
    }

    protected function importAttendance(array $rows)
    {
        foreach ($rows as $row) {
            // Validate and insert attendance data
            // Example: date, student_id, type, status
            DB::table('attendance')->updateOrInsert(
                [
                    'date' => $row['date'],
                    'student_id' => $row['student_id'],
                ],
                [
                    'type' => $row['type'],
                    'status' => $row['status'],
                    'updated_at' => now(),
                    'created_at' => now(),
                ]
            );
        }
    }

    protected function importStudents(array $rows)
    {
        foreach ($rows as $row) {
            // Validate and insert student profile data
            DB::table('profiles')->updateOrInsert(
                [
                    'student_id' => $row['student_id'],
                ],
                [
                    'full_name' => $row['full_name'],
                    'gender' => $row['gender'],
                    'class' => $row['class'],
                    'batch' => $row['batch'],
                    'parent_data' => json_encode([
                        'father_name' => $row['father_name'] ?? null,
                        'mother_name' => $row['mother_name'] ?? null,
                    ]),
                    'contact_info' => $row['contact_info'] ?? null,
                    'updated_at' => now(),
                    'created_at' => now(),
                ]
            );
        }
    }
}
