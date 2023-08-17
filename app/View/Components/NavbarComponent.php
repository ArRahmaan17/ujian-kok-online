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
        $navbar = DB::table('menus')->where('position', 'navbar');
        $controlMenu = DB::table('menus')->where('position', 'control-menu');
        if (auth()->user()->is_developer) {
            $navbar->where('for_developer', true);
            $controlMenu->where('for_developer', true);
        } elseif (auth()->user()->is_teacher) {
            $navbar->where('for_teacher', true);
            $controlMenu->where('for_teacher', true);
        } elseif (auth()->user()->is_student) {
            $navbar->where('for_student', true);
            $controlMenu->where('for_student', true);
        }
        $controlMenu = $controlMenu->get();
        $navbar = $navbar->get();

        return view('components.navbar-component', compact('navbar', 'controlMenu'));
    }
}
