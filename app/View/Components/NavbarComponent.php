<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class NavbarComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|\Closure|string
    {
        $navbar = DB::table('menus')->where('position', 'navbar')->get();
        $controlMenu = DB::table('menus')->where('position', 'control-menu')->get();

        return view('components.navbar-component', compact('navbar', 'controlMenu'));
    }
}
