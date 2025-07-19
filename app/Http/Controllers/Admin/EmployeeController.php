<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Spatie\Image\Image;

class EmployeeController extends Controller
{
    public function index()   // API: List all employees
    {
        $employees = Employee::all();
        return response()->json(
            [
                'success' => true,
                'employees' => $employees
            ]
        );
    }


    public function store(Request $request)  // API: Store new employees
    {
        
          // Validate the request data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees',
            'address' => 'required',
            'salary' => 'required',
            'joining_date' => 'required',
            'nid' => 'nullable',
            'image' => 'nullable|mimes:png,jpg,gif,jpeg,tiff,bmp,webp',
        ]);
        
       

        // Check if an image is uploaded
        if (isset($request->image)) {
            // Save the image with a unique name and the original file extension
            $imageName = $request->name . '_' . time() . '.' . $request->image->extension();

            // Define the path for the post images
            $employeeImagePath = public_path('employeeImages');

            // Create folder if doesn't exist
            if (!File::exists($employeeImagePath)) {
                File::makeDirectory($employeeImagePath, 0755, true);
            }

            // Resize the image  and save it
            Image::load($request->image->path())
                ->resize(400, 400)
                ->save($employeeImagePath . '/' . $imageName);
        } else {
            // If no uploaded image, keep the default image name 'default.png'
            $imageName = 'default.png';
        }
            
 

        $employee = new Employee();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->address = $request->address;
        $employee->salary = $request->salary;
        $employee->joining_date = $request->joining_date;
        $employee->nid = $request->nid;
        $employee->image = $imageName;
        $employee->save();



        return response()->json([
            'success' => true,
            'message' => 'employee registered successfully',
            'employee' => $employee,
        ]);
    }


    // public function edit($id)  // API: Edit employee
    // {
    //     $employee = Employee::findOrFail($id);
    //     return response()->json(
    //         [
    //             'employeeIndex' => [
    //                 'title' => $employee->title,
    //                 'description' => $employee->description,
    //                 'image' => asset('employeeImages/' . $employee->image), // ✅ Full image URL
    //             ],
    //             'success' => true,
    //             // 'employeesIndex' => $employees
    //         ]
    //     );
    // }

    // public function update(Request $request, $id)  // API: Update employees
    // {
    //     return $request->all();
    //     //  $request->validate([
    //     //     'name' => 'required|max:100',
    //     //     'email' => 'required|email|unique:employees',
    //     //     'address' => 'required|max:500',
    //     //     'salary' => 'required',
    //     //     'joining_date' => 'required',
    //     //     'nid'  => 'nullable',
    //     //     'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    //     // ]);
        
    //     $employee = Employee::findOrFail($id);
        
    //     $employee->name = $request->name;
    //     $employee->email = $request->email;
    //     $employee->address = $request->address;
    //     $employee->salary = $request->salary;
    //     $employee->joining_date = $request->joining_date;
    //     $employee->nid = $request->nid;

    //     // Check if an image is uploaded
    //     if (isset($request->image)) {
    //         // Save the image with a unique name and the original file extension
    //         $imageName = $request->name . '_' . time() . '.' . $request->image->extension();

    //         // Define the path for the post images
    //         $employeeImagePath = public_path('employeeImages');

    //         // Delete the old image if it exists
    //         if ($employee->image != $imageName && file_exists($employeeImagePath.'/'.$employee->image)) {
    //             unlink($employeeImagePath.'/'.$employee->image);

    //         // Resize the image  and save it
    //         Image::load($request->image->path())->resize(400, 400)->save($employeeImagePath . '/' . $imageName);
    //         }
    //     } else {
    //         // If no uploaded image, keep the default image name 'EmployeesImage.png'
    //         $imageName = $employee->image;
    //     }
            
        
    //     $employee->image = $imageName;
    //     $employee->save();

    //     return response()->json([
    //         'success' => true
    //     ]);
    // }

    // public function showSingle($id)  // API: Show single employee
    // {
    //     $employee = Employee::findOrFail($id);
    //     return response()->json([
    //         'success' => true,
    //         'employee' => $employee
    //     ]);
    // }

    // public function destroy($id)   // API: Delete employee
    // {
    //     $employee = Employee::findOrFail($id);
    //     $deleteOldImage = 'employeeImages/' . $employee->image;

    //     // if (file_exists($deleteOldImage)) {
    //     //     File::delete($deleteOldImage);
    //     // }
    //     // Delete the employee image from the server
    //     $employeeImagePath = public_path('employeeImages');
    //     if (file_exists($employeeImagePath . '/' . $employee->image)) {
    //         unlink($employeeImagePath . '/' . $employee->image);
    //      }
         
    //     $employee->delete();

    //     return response()->json([
    //         'success' => true
    //     ]);
    // }
}
