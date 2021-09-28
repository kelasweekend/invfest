<?php

namespace App\Http\Controllers\Lomba;

use App\Http\Controllers\Controller;
use App\Models\Lomba\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class KategoriController extends Controller
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
            $data = Kategori::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" data-url="' . route('kategori.edit', $row->id) . '" class="edit btn btn-primary btn-sm editItem"><i class="fas fa-edit"></i></a>';
                    $actionBtn = $actionBtn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-url="' . route('kategori.destroy', $row->id) . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem"><i class="fas fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.kategori.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nama_kategori' => 'required',
            'body' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'slug_kategori' => str_replace(' ', '-', $request->nama_kategori),
            'body' => $request->body
        ]);

        return response()->json(['success'=>'Kategori Berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Kategori::find($id);
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kategori::find($id)->delete();

        return response()->json(['success'=>'Kategori deleted successfully']);
    }
}
