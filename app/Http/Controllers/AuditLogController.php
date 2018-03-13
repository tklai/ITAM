<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\AuditLog;

class AuditLogController extends Controller
{
    public function index()
    {
        return view('audits.index');
    }

    public function auditList($id)
    {
        $this->checkNull($id, 'audits');
        $audits = AuditLog::where('asset_id', $id)->get();
        return $audits;
    }

    public function check($id)
    {
        $this->checkNull($id, 'audits');
        AuditLog::create([
            'asset_id'   => $id,
            'audited_on' => time(),
            'user'       => Auth::user()->name
        ]);
        Session::flash('Inventory checked.');
        return redirect()->route('assets.index');
    }
}
