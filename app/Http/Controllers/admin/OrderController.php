<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Services\OrderService;
use App\Http\Services\UserService;
use App\Http\Services\SubRankService;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    public $data = [];

    public function __construct(OrderService $orderService, SubRankService $subRankService, UserService $userService)
    {
        $this->orderService = $orderService;
        $this->subRankService = $subRankService;
        $this->userService = $userService;
    }

    public function index()
    {
        dd(Order::all());
    }

    public function myOrder()
    {
        $this->data['orders'] = $this->orderService->yourOrder();
        return view('user.pages.plow.index', $this->data);
    }

    public function create(Request $request){
        if (!empty($request->rank1) && !empty($request->rank2)) {
            $this->data['money'] = $this->subRankService->calulateMony($request);
            if (!empty($this->data['money']['error']))
                return redirect()->back()->with('error', 'Rank hiện tại phải thấp hơn rank muốn cày');
        }

        $this->data['subranks'] = $this->subRankService->paginate(1000, $request->rank_id);
        return view('user.pages.plow.create', $this->data);
    }

    public function solveFormCreate(Request $request)
    {
//        dd($request->all());
        $order = new Order();
        $order->account_id = auth()->user()->account_id;
        $order->rank1_id = $this->subRankService->findByvalue($request->rank1)->id;
        $order->rank2_id = $this->subRankService->findByvalue($request->rank2)->id;
        $order->star1 = $request->star1;
        $order->star2 = $request->star2;
        $order->totalMoney = $request->totalMoney;

        if ($this->userService->updateMoney(-$order->totalMoney)) {
            $this->orderService->create($order);
            return redirect(route('user.plow.index'))->with('info', 'Mua thành công');
        }

        return redirect(route('user.plow.index'))->with('error', 'Mua thất bại do không đủ tiền');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
