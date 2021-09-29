<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting\MediaPartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class MediapartnerController extends Controller
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
            $data = MediaPartner::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-url="' . route('medpart.destroy', $row->id) . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem"><i class="fas fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->addColumn('image', function ($row) {
                    $image = '<img src="/assets/medpart/'. $row->image_media_partner.'" width="50%">';
                    return $image;
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }

        return view('setting.mediapartner');
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
            'nama_media_partner' => 'required',
            'file'  => 'required|mimes:jpg,png,jpeg|max:1048',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()], 200);
        }

        //store file into document folder
        $imageName = time() . '.' . $request->file->extension();
        
        MediaPartner::create([
            'nama_media_partner' => $request->nama_media_partner,
            'image_media_partner' => $imageName
        ]);
        
        $file = $request->file->move(public_path('assets/medpart'), $imageName);
        
        return Response()->json([
            "success" => "Media Partner Berhasil diUpload",
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
        $data = MediaPartner::find($id);
        $image_path = public_path('assets/medpart/'. $data->image_media_partner);
        unlink($image_path);    
        $data->delete();
        return response()->json(['success' => 'Media Partner berhasil dihapus']);
    }
}
