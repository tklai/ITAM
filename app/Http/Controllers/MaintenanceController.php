<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use App\Maintenance;

class MaintenanceController extends Controller
{
    /**
     * Show the form for creating a new asset.
     *
     * @return \Illuminate\View\View
     */
    public function create($id)
    {
        $asset = Asset::with('vendor')->findOrFail($id);
        return view('maintenances.create')->with('asset', $asset);
    }

    /**
     * Store a newly created asset in storage.
     *
     * @param  \App\Http\Requests\AssetRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $id)
    {
        Maintenance::create([
            'asset_id'     => $id,
            'call_number'  => $request->input('call_number'),
            'reason'       => $request->input('reason'),
            'place_date'   => $request->input('place_date'),
            'return_date'  => $request->input('return_date'),
        ]);
        return redirect()->route( 'assets.show', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified asset.
     *
     * @param  int $asset
     * @return \Illuminate\View\View
     */
    public function edit($id, $maintenance_id)
    {
        $this->checkNull($maintenance_id, 'maintenances');
        $maintenance = Maintenance::findOrFail($maintenance_id);
        return view('maintenances.edit')->with('maintenance', $maintenance);
    }


    /**
     * Update the specified asset in storage.
     *
     * @param  \App\Http\Requests\AssetRequest $request
     * @param  int $asset
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id, $maintenance_id)
    {
        $this->checkNull($maintenance_id, 'maintenances');
        Maintenance::findOrFail($maintenance_id)->update([
            'return_date'  => $request->input('return_date'),
        ]);
        return redirect()->route('assets.show', ['id' => $id]);
    }

    public function maintenanceList($id)
    {
        $this->checkNull($id, 'maintenances');
        $maintenance = Maintenance::where('asset_id', $id)
            ->with('asset', 'vendor')
            ->get();
        return $maintenance;
    }

}
