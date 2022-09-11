<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Http\Services\PaymentService;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PaymentController extends Controller
{
    protected $data = [];

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function index()
    {
        return redirect(route('user.payment.create'));
    }

    public function comfirm($code = null)
    {
        $payment = $this->paymentService->findByCode($code);
        if ($payment !== null) {
            $this->paymentService->updateMoney($payment);
            return redirect(route('homeUser'))
                ->with('info', 'Nạp tiền thành công '.$payment->money.' Cho tài khoản '.$payment->account->username);
        }
        return redirect(route('homeUser'))
            ->with('error', 'Nạp tiền không thành công');
    }

    public function create()
    {
        return view('user.pages.payment.create');
    }

    public function solveFormCreate(Request $request)
    {
        $data = new Payment();
        $data->account_id = auth()->user()->account_id;
        $data->money = $request->money;
        $data->status = 0;
        $data->code = Str::random(50);
        $this->paymentService->add($data);

        $this->data['code'] = $data->code;
        $this->data['textQRcode'] = route('user.payment.comfirm').'/'.$data->code;
        $this->data['QRcode'] = QrCode::size(300)->generate(route('user.payment.comfirm').'/'.$data->code);
        return view('user.pages.payment.comfirm', $this->data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaymentRequest  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
