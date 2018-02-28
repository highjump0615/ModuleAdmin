<?php

namespace App\Http\Controllers;

use App\Models\Version;
use Illuminate\Http\Request;

class VersionController extends Controller
{
    public $viewBaseParms;

    public function __construct() {
        $this->viewBaseParms = [
            'menu'  => 'version',
            'title' => 'Version',
        ];
    }

    /**
     * Shows the app version page
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showVersion(Request $request) {

        $versions = Version::paginate();

        return view('version.list', array_merge($this->viewBaseParms, [
            'versions' => $versions,
        ]));
    }

    /**
     * Save version
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function saveVersion(Request $request) {
        if($request->has('id')) {
            $vid = $request->input('id');
            $v = Version::find($vid);
        }
        else {
            $v = new Version();
        }

        if($request->has('version')) {
            $v->version = $request->input('version');
        }
        $v->description = $request->input('description');
        $v->url = $request->input('url');
        $v->save();

        return redirect()->back();
    }

    /**
     * Delete version
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteVersion(Request $request) {
        $versionId = $request->input('id');
        Version::find($versionId)->delete();

        return redirect()->back();
    }
}
