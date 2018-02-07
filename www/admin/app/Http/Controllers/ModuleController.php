<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public $viewBaseParms;

    public function __construct() {
        $this->viewBaseParms = [
            'menu'  => 'module',
            'title' => 'Module',
        ];
    }

    /**
     * Shows the module list page
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showModule(Request $request) {
        return view('module.list', array_merge($this->viewBaseParms, [
        ]));
    }
}
