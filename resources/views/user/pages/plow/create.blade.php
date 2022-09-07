@extends('user.layouts.main')
@section('title_page')
    Create Rank - {{ config('app.name') }}
@endsection
@section('name_user')
    {{(auth()->user()->account->username)}}

@endsection
@section('email_user')
    Tài khoản: {{number_format(auth()->user()->money, 0, '', ',')}} VND
@endsection

@section('role_user')
    @foreach(auth()->user()->account->roles->take(4) as $role)
        <span class="badge badge-light-{{$role->color}} fw-bold fs-8 py-1 mx-auto">{{$role->role_name}}</span>
    @endforeach
@endsection

@section('css_custom')
    <link href="{{asset('/admin/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <style>
        img{
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
    </style>
@endsection
@section('js_custom')
    <script src="{{asset('/admin/assets/plugins/global/plugins.bundle.js')}}"></script>

@endsection
@section('menu')
    @php
        $menu_parent = 'plow';
        $menu_child = 'create';
    @endphp
@endsection
@section('title_component')
    Create plow
@endsection
@section('title_layout')
    Create plow
@endsection

@section('actions_layout')
@endsection

@section('title_card')
    Create plow
@endsection

@section('onload')
    @if ($message = Session::get('info'))
        onload="abc('{{$message}}' , 'success')"
    @endif
    @if ($message = Session::get('error'))
        onload="abc('{{$message}}' , 'danger')"
    @endif
    @if ($message = Session::get('warning'))
        onload="abc('{{$message}}' , 'warning')"
    @endif
@endsection

@section('content_card')
    @if (!empty($money))
        <h4>Tiến trình</h4>
        <div class="table-responsive">
            <table class="table search-table-outter table-striped">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">Hình ảnh</th>
                        <th class="text-center" scope="col">Tên rank</th>
                        <th class="text-center" scope="col">Số sao</th>
                        <th class="text-center" scope="col">Giá thành</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $index = 0;
                @endphp
                @forelse ($money['data'] as $item)
                    <tr class="align-middle">
                        <th class="align-middle text-center" scope="row">{{++$index}}</th>
                        <td class="align-middle text-center">
                            <img src="{{url($item->subRank->rank->url_image)}}" alt="..." class="rounded mx-auto d-block">
                        </td>
                        <td class="align-middle text-center">{{$item->subRank->sub_rank_name}}</td>
                        <td class="align-middle text-center">{{$item->star}}</td>
                        <td class="align-middle text-center">{{number_format($item->subRank->price, 0, '', ',')}}</td>
{{--                        <td class="align-middle text-center">{{$item->id}}</td>--}}

                    </tr>
                @empty
                    <h1 class="text-light text-center">Không có dữ liệu</h1>
                @endforelse
                <tr class="align-middle">
                    <td class="align-middle text-center" colspan="4">Tổng tiền</td>
                    <td class="text-danger text-bold align-middle text-center">{{number_format($money['totalMoney'], 0, '', ',')}}</td>



                </tr>

                </tbody>
            </table>
        </div>
    @endif
    @if (empty($money))
    <form action="" method="get" class="py-5" >
        <div class="row my-4">
            <div class="form-group col-6">
                <label for="rank1">Từ rank
                <select class="form-select col col-8" data-control="select2" id="rank1" name="rank1" data-placeholder="Select an option">
                        @foreach($subranks as $item)
                            <option value="{{$item->value}}">{{$item->sub_rank_name}}</option>
                        @endforeach
                </select>
            </div>
            <div class="form-group col-6">
                <label for="star1">Số sao
                <select class="form-select col col-8" data-control="select2" id="star1" name="star1" data-placeholder="Select an option">
                    @for($i = 1; $i <= 100; $i++)
                        <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
            </div>
        </div>


        <div class="row my-4">
            <div class="form-group col-6">
                <label for="rank2">Đến rank
                <select class="form-select col col-8" data-control="select2" id="rank2" name="rank2" data-placeholder="Select an option">
                    @foreach($subranks as $item)
                        <option value="{{$item->value}}">{{$item->sub_rank_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-6">
                <label for="star2">Số sao
                <select class="form-select col col-8" data-control="select2" id="star2" name="star2" data-placeholder="Select an option">
                    @for($i = 1; $i <= 100; $i++)
                        <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
            </div>
        </div>
        <div class="row my-4">
            <div class="form-group col-6">
                <input type="submit" class="btn btn-primary"  value="Tính tiền">
            </div>
        </div>
    </form>
    @endif
@endsection

@section('footer_card')
@endsection

@section('content_layout')
    <!--begin::Card-->
    <div class="card shadow-sm card-bordered">
        <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
             data-bs-target="#kt_docs_card_collapsible">
            <h3 class="card-title">@yield('title_card')</h3>
            <div class="card-toolbar rotate-180">
                <span class="svg-icon svg-icon-1">
                   <i class="fa fa-angle-down"></i>
                </span>
            </div>
        </div>
        <div id="kt_docs_card_collapsible" class="collapse show">
            <div class="card-body">
                @yield('content_card')
            </div>
            <div class="card-footer">
                @yield('footer_card')
            </div>
        </div>
    </div>
    <!--end::Card-->
@endsection

