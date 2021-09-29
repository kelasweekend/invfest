<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class SponsorController extends Controller
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
            $data = Sponsor::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-url="' . route('sponsor.destroy', $row->id) . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem"><i class="fas fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->addColumn('image', function ($row) {
                    $image = '<img src="/assets/sponsor/'. $row->image_sponsor.'" width="50%">';
                    return $image;
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }

        return view('setting.sponsor');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_sponsor' => 'required',
            'file'  => 'required|mimes:jpg,png,jpeg|max:1048',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()], 200);
        }

        //store file into document folder
        $imageName = time() . '.' . $request->file->extension();
        
        Sponsor::create([
            'nama_sponsor' => $request->nama_sponsor,
            'image_sponsor' => $imageName
        ]);
        
        $file = $request->file->move(public_path('assets/sponsor'), $imageName);
        
        return Response()->json([
            "success" => "Sponsor Berhasil diUpload",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Sponsor::find($id);
        $image_path = public_path('assets/sponsor/'. $data->image_sponsor);
        unlink($image_path);    
        $data->delete();
        return response()->json(['success' => 'Sponsor berhasil dihapus']);
    }
}
