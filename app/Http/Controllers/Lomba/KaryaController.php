<?php

namespace App\Http\Controllers\Lomba;

use App\Http\Controllers\Controller;
use App\Models\Lomba\Karya;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KaryaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            # jika request berasal dari ajax
            $data = Karya::join('pendaftarans', 'pendaftarans.invoice', 'karyas.invoice')->join('kategoris', 'kategoris.id', 'pendaftarans.kategori_id')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="'. $row->link_karya .'" target="__blank" class="edit btn btn-primary btn-sm"><i class="fas fa-file-download"></i> Unduh Karya</a>';
                    $actionBtn = $actionBtn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-url="' . route('karya.destroy', $row->id) . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem"><i class="fas fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.karya.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Karya::find($id)->delete();
        return response()->json(['success' => 'Karya deleted successfully']);
    }
}
