<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserupdateRequest;
use App\Models\Profile;
use App\Models\User;
use Aws\Credentials\Credentials;
use Aws\Credentials\InstanceProfileProvider;
use Aws\Exception\AwsException;
use Aws\MediaConvert\MediaConvertClient;

use Aws\S3\S3Client;
use Aws\Sdk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
//        set_time_limit(3000);
//        $credentials = new Credentials('AKIAQZ67EASU5A4MR26U', 'n8BXSHYMTAoOFXsUUd/vHyifcfp8Wi7RzANi9SPt');
//        $s3 = new S3Client([
//            'version'     => '2006-03-01',
//            'region'      => 'us-west-2',
//            'credentials' => $credentials
//        ]);
//        $result = $s3->createBucket([
//            'Bucket' => 'examplebucket',
//        ]);
//        $buckets = $s3->listBuckets();
//        foreach ($buckets['Buckets'] as $bucket) {
//            return $bucket['Name'] . "\n";
//        }

        $rows = User::with('roles')->get();

        return view('panel.users.index', ['rows' => $rows]);
    }

    public function create()
    {
        $roles = Role::all();

        return view('panel.users.create', ['roles' => $roles]);
    }

    public function store(UserCreateRequest $request)
    {

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'national_code' => $request->national_code,
            'password' => Hash::make($request->national_code),
        ]);
        $role = Role::where('id', $request->role)->first();
        $user->assignRole($role);
        alert()->success('successful', 'new user create successfully');
        return redirect('/users');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('panel.users.edit', ['row' => $user, 'roles' => $roles]);
    }

    public function update(User $user, UserupdateRequest $request)
    {
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'national_code' => $request->national_code,
            'password' => Hash::make($request->national_code),
        ]);
        $role = Role::where('id', $request->role)->first();
        $user->syncRoles($role);
        alert()->success('successful', 'user edit successfully');

        return redirect('/users');
    }

    public function destroy(User $user)
    {
        $user->delete();
    }

}
