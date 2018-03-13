<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

}
