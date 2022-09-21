<?php

namespace App\Http\Services;


use App\Models\blog;
use App\Models\blogAccount;
use Cookie;

class BlogService
{
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    public function getAll($sort = 'asc') {
        return $this->blog->blogBy('id',$sort)->paginate();
    }

    public function delete($id) {
        $blog = $this->blog->find($id);
        $blog->delete();
    }

    public function update($id, $data) {
        $this->blog->where('id', $id)->update($data);
        return $this->blog->find($id);
    }

    public function create($data) {
        $blog = $data;
        $blog->save();
    }


    public function find($id) {
        return $this->blog->find($id);
    }


    public function paginate($limit, $keywords){
        $blog = $this->blog;
        $blog = $blog->orderBy('created_at','asc');
        if (!empty($keywords)) {
            $blog->where('created_at', 'like', '%'. $keywords.'%');
        }
        return $blog->paginate($limit)->withQueryString();
    }

}
