<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::orderBy('id', 'asc')->get();

        return view('pages.developer.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $results = Route::getRoutes()->getRoutesByName();
        $routes = [];
        foreach ($results as $index => $result) {
            if ('GET' == $result->methods[0] && 'web' == $result->action['middleware'][0] && ('/authentication' != $result->action['prefix'] && 'sanctum' != $result->action['prefix'])) {
                $routes[] = $result;
            }
        }

        return view('pages.developer.menu.create', compact('routes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'route' => 'required',
            'position' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $data = $request->except('_token');
            $data['created_at'] = now('Asia/Jakarta');
            Menu::storeNewMenu($data);
            DB::commit();

            return Redirect()->route('menu.index')->with('message', 'Success, new menu added successfully');
        } catch (\Throwable $th) {
            DB::rollBack();

            return Redirect()->route('menu.create')->with('message', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menu = Menu::find($id);
        $results = Route::getRoutes()->getRoutesByName();
        $routes = [];
        foreach ($results as $index => $result) {
            if ('GET' == $result->methods[0] && 'web' == $result->action['middleware'][0] && ('/authentication' != $result->action['prefix'] && 'sanctum' != $result->action['prefix'])) {
                $routes[] = $result;
            }
        }

        return view('pages.developer.menu.create', compact('routes', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'route' => 'required',
            'position' => 'required',
        ]);
        $data = $request->except('_token', '_method');
        $data['updated_at'] = now('Asia/Jakarta');
        DB::beginTransaction();
        try {
            Menu::where('id', $id)->update($data);
            DB::commit();

            return redirect()->route('menu');
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', 'failed to update menu');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
