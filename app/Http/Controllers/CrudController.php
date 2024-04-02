<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
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
                    $btn = '<a href="'.route('lists.show', $row->id).'" class="btn btn-primary btn-sm">View</a>';
                    $btn .= ' <a href="'.route('lists.edit', $row->id).'" class="btn btn-warning btn-sm">Edit</a>';
                    $btn .= ' <form action="'.route('lists.destroy', $row->id).'" method="POST" style="display:inline;">
                                '.csrf_field().'
                                '.method_field('DELETE').'
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')">Delete</button>
                            </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('lists');
    }

    public function create()
    {
        return view('lists.create');
    }

    public function store(Request $request)
    {
        $this->userService->create($request->all());

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
        $this->userService->update($id, $request->all());

        return redirect()->route('lists.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $this->userService->delete($id);

        return redirect()->route('lists.index')->with('success', 'User deleted successfully.');
    }
}
