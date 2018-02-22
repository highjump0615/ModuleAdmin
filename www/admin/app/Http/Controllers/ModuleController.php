<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

use File;
use Illuminate\Support\Facades\Input;

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

        $queryModule = Module::whereRaw('1=1');

        // description
        if ($request->has('desc')) {
            $queryModule->where('description', 'like', '%' . $request->input('desc') . '%');
        }
        if ($request->has('date')) {
            $strDate = $request->input('date');
            $queryModule->whereDate('created_at', $request->input('date'));
        }

        $modules = $queryModule->paginate();

        return view('module.list', array_merge($this->viewBaseParms, [
            'modules' => $modules,
        ]));
    }

    /**
     * Save module
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function saveModule(Request $request) {
        if($request->has('id')) {
            $mid = $request->input('id');
            $m = Module::find($mid);
        }
        else {
            $m = new Module();
        }

        // 文件
        if ($request->hasFile('fileData')) {
            $fileData = $request->file('fileData');
            if ($fileData->isValid()) {

                // create product photo directory, if not exist
                if (!file_exists(getModuleFilePath())) {
                    File::makeDirectory(getModuleFilePath(), 0777, true);
                }

                // generate file name p**********.ext
                $strName = date('YmdHis') . $fileData->getClientOriginalName();

                // move file to upload folder
                $fileData->move(getModuleFilePath(), $strName);

                $m->filePath = $strName;
            }
        }

        $m->description = $request->input('description');
        $m->save();

        return redirect()->back();
    }

    /**
     * Delete Module
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteModule(Request $request) {
        $moduleId = $request->input('id');
        Module::find($moduleId)->delete();

        return redirect()->back();
    }
}
