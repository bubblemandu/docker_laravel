<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CafeController extends Controller{

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $data = DB::connection('mysql')->table('cafe_list')->get();
        return view('cafe.index', [ 'data' => $data ]);
    }

    public function setCampaign()
    {
        $params = [];
        $params['name'] = $this->request->input('title') ?? '';
        $params['shopName'] = $this->request->input('shopName') ?? '';

        DB::connection('mysql')->table('cafe_list')->insert($params);
        return redirect()->back();
    }

    public function menu($no)
    {
        $listData = DB::connection('mysql')->table('cafe_list')->where('no', $no)->first();
        $menuList = DB::connection('mysql')->table('menu_list')->where('list_no', $no)->get();
        return view('cafe.menuList',[
            'data' => $listData,
            'menu' => $menuList
        ]);
    }

    public function setMenu()
    {
        $params = [];
        $params['name'] = $this->request->input('name') ?? '';
        $params['first_menu'] = $this->request->input('firstMenu') ?? '';
        $params['second_menu'] = $this->request->input('secondMenu') ?? '';
        $params['size'] = $this->request->input('size') ?? '';
        $params['list_no'] = $this->request->input('list_no') ?? '';

        DB::connection('mysql')->table('menu_list')->insert($params);
        return redirect()->back();
    }
}
