<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use Illuminate\Support\Facades\Validator;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->api['ok'] = 1;
    }

    public function getAllPackages() {
        $packages = Package::all();

        $this->api['data'] = $packages;
        return response()->json($this->api);
    }

    public function getPackage($id) {
        $package = Package::find($id);

        $this->api['data'] = $package;
        return response()->json($this->api);
    }

    public function createPackage(Request $request) {
        $validator = Validator::make($request->all(), [
            'package_name' => 'required|max:255',
            'customer_name' => 'required|min:4',
            'customer_address' => 'required|min:5',
            'customer_email' => 'required|unique:Package,customer_email|email:rfc',
            'customer_phone' => 'required|min:8|numeric',
            'receiver_name' => 'required|min:4',
            'receiver_address' => 'required|min:5',
            'receiver_phone' => 'required|min:8|numeric',
        ]);

        if($validator->fails()) {
            $this->api['ok'] = 0;
            $this->api['message'] = $validator->messages();
            return response()->json($this->api,400);
        };

        $package = Package::create([
            'package_name' => $request->input('package_name'),
            'customer_name' => $request->input('customer_name'),
            'customer_address' => $request->input('customer_address'),
            'customer_email' => $request->input('customer_email'),
            'customer_phone' => $request->input('customer_phone'),
            'receiver_name' => $request->input('receiver_name'),
            'receiver_address' => $request->input('receiver_address'),
            'receiver_phone' => $request->input('receiver_phone'),
        ]);

        $this->api['data'] = $package;
        $this->api['message'] = 'create package success';
        return response()->json($this->api);
    }

    public function updatePackage(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'package_name' => 'required|max:255',
            'customer_name' => 'required|min:4',
            'customer_address' => 'required|min:5',
            'customer_email' => 'required|unique:Package,customer_email|email:rfc',
            'customer_phone' => 'required|min:8|numeric',
            'receiver_name' => 'required|min:4',
            'receiver_address' => 'required|min:5',
            'receiver_phone' => 'required|min:8|numeric',
        ]);

        if($validator->fails()) {
            $this->api['ok'] = 0;
            $this->api['message'] = $validator->messages();
            return response()->json($this->api,400);
        };

        $package = Package::find($id);
        $package->update([
            'package_name' => $request->input('package_name'),
            'customer_name' => $request->input('customer_name'),
            'customer_address' => $request->input('customer_address'),
            'customer_email' => $request->input('customer_email'),
            'customer_phone' => $request->input('customer_phone'),
            'receiver_name' => $request->input('receiver_name'),
            'receiver_address' => $request->input('receiver_address'),
            'receiver_phone' => $request->input('receiver_phone'),
        ]);

        $this->api['data'] = $package;
        $this->api['message'] = 'update package success';
        return response()->json($this->api);
    }

    public function updatePackageName(Request $request, $id) {
        $package = Package::find($id);
        $package->update([
            'package_name' => $request->input('package_name')
        ]);

        $this->api['data'] = $package;
        $this->api['message'] = 'package name has been changed';
        return response()->json($this->api);
    }

    public function deletePackage($id) {
        $package = Package::find($id);
        $package->delete();

        $this->api['message'] = 'successfully delete package';
        return response()->json($this->api);
    }
}
