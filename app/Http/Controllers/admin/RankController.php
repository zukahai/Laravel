<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRankRequest;
use App\Http\Requests\UpdateRankRequest;
use App\Http\Services\RankService;
use App\Models\Rank;
use Illuminate\Http\Request;

class RankController extends Controller
{
    protected $data = [];

    public function __construct(RankService $rankService)
    {
        $this->rankService = $rankService;
    }

    public function index()
    {
        $this->data['ranks'] = $this->rankService->getAll();
        return view('admin.pages.rank.index', $this->data);
    }

    public function solveFormCreate(Request $request) {
        $request->validate(
            [
                'rank_name' => 'required',
                'image' => 'required',
            ],
            [
                'rank_name.required' => 'Vui lòng nhập tên rank',
                'image.required' => 'Vui lòng chọn ảnh',
            ]
        );
        if ($request->hasFile('image')) {
            $file = $request->image;
            $path = $file->store('images');
            $file->move(public_path('images'), $path);
        } else {
            return "Vui long chon file";
        }
        $data = new Rank();
        $data->rank_name = $request->rank_name;
        $data->url_image = $path;
        $this->rankService->create($data);

        return redirect(route('admin.rank.index'));
    }

    public function create()
    {
        return view('admin.pages.rank.create');
    }

    public function delete($id)
    {
        $this->rankService->delete($id);
        return $id;
    }

    public function store(StoreRankRequest $request)
    {
        //
    }

    public function show(Rank $rank)
    {
        //
    }

    public function edit(Rank $rank)
    {
        //
    }

    public function update(UpdateRankRequest $request, Rank $rank)
    {
        //
    }

    public function destroy(Rank $rank)
    {
        //
    }
}
