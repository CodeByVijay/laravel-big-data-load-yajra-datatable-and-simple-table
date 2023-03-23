<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Pagination\LengthAwarePaginator;

class PostController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Post::join('users', 'users.id', '=', 'posts.user_id')->select('posts.*', 'users.name');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<a href="javascript:void(0)" data-id="' . $data->id . '" class="edit btn btn-primary btn-sm">View</a>';
                    $btn .= '<a href="javascript:void(0)" data-id="' . $data->id . '" class="edit btn btn-success btn-sm">Edit</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('welcome');
    }


    public function customPagination($items, $perPage)
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $collection = collect($items);
        $perPage = $perPage;
        $currentPageItems = $collection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $paginatedItems = new LengthAwarePaginator($currentPageItems, count($collection), $perPage);
        return $paginatedItems->setPath(request()->url());
    }

    public function customPagination1($items, $perPage,$Totalpages)
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $collection = collect($items);
        $perPage = $perPage;
        $currentPageItems = $collection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $paginatedItems = new LengthAwarePaginator($currentPageItems, count($collection), $perPage);
        return $paginatedItems->setPath(request()->url());
    }

    public function home()
    {
        $datas = Post::join('users', 'users.id', '=', 'posts.user_id')->select('posts.*', 'users.name')->paginate(10);

        // $perPage = 10;
        // $datas = $this->customPagination($Posts, $perPage);
        return view('home', compact('datas'));
    }
}
