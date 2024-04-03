<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;


class CrudController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->userService->all();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $btn = '<div class="text-center">';
                    $btn .= '<a href="' . route('lists.show', $row->id) . '" class="btn btn-secondary btn-sm text-capitalize">View</a>';
                    $btn .= ' <a href="' . route('lists.edit', $row->id) . '" class="btn btn-primary btn-sm text-capitalize">Edit</a>';
                    $btn .= ' <form id="deleteForm_'. $row->id .' "action="' . route('lists.destroy', $row->id) . '" method="POST" style="display:inline;">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                <button type="submit" class="btn btn-danger btn-sm text-capitalize btn-delete">Delete</button>
                            </form></div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('lists.index');
    }

    public function create()
    {
        return view('lists.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|alpha_num',
            'address' => 'nullable|regex:/^[a-zA-Z0-9\s.,#-]+$/',
        ]);

        $user = $this->userService->create($request->all());

        Alert::success('Success', 'User ' . $user->name . ' has been created successfully.')->autoclose(5000);
        return redirect()->route('lists.index')->with('success', 'User created successfully.');
    }

    public function show($id)
    {
        $user = $this->userService->find($id);
        return view('lists.show', compact('user'));
    }

    public function edit($id)
    {
        $user = $this->userService->find($id);
        return view('lists.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'phone' => 'nullable|alpha_num',
            'address' => 'nullable|regex:/^[a-zA-Z0-9\s.,#-]+$/',
        ]);

        $user = $this->userService->update($id, $request->all());

        Alert::success('Success', 'User' . $user->name . ' has been updated successfully.')->autoclose(5000);
        return redirect()->route('lists.index');
    }

    public function destroy($id)
    {
        $user = $this->userService->delete($id);

        Alert::success('Success', 'User ' . $user->name . ' has been deleted successfully.')->autoclose(5000);
        return redirect()->route('lists.index');
    }
}
