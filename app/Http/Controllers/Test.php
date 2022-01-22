<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ecpay\Sdk\Factories\Factory;
use Ecpay\Sdk\Services\UrlService;
use Ecpay\Sdk\Exceptions\RtnException;

class Test extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // require __DIR__ . '/../../vendor/autoload.php';

        try {
            $factory = new Factory([
                'hashKey' => '5294y06JbISpM5x9',
                'hashIv' => 'v77hoKGq4kWxNNIS',
            ]);
            $autoSubmitFormService = $factory->create('AutoSubmitFormWithCmvService');

            $input = [
                'MerchantID' => '2000132',
                'MerchantTradeNo' => 'Test' . time(),
                'MerchantTradeDate' => date('Y/m/d H:i:s'),
                'PaymentType' => 'aio',
                'TotalAmount' => 100,
                'TradeDesc' => UrlService::ecpayUrlEncode('交易描述範例'),
                'ItemName' => '範例商品一批 100 TWD x 1',
                'ReturnURL' => 'https://www.ecpay.com.tw/example/receive',
                'ChoosePayment' => 'Credit',
                'EncryptType' => 1,
            ];
            $action = 'https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5';

            echo $autoSubmitFormService->generate($input, $action);
        } catch (RtnException $e) {
            echo '(' . $e->getCode() . ')' . $e->getMessage() . PHP_EOL;
        }
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
        //
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
        //
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
        //
    }
}
