<?php

namespace App\Admin\Controllers;

use App\Models\AccountRecord;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;

class AccountRecordController extends AdminController
{
    protected $title = "资金流水";
    const TRANS_TYPE=[
        1=>'充值',
        2=>'收入',
        3=>'佣金',
        4=>'提现返还',
        5=>'注册彩金',
        6=>'提现',
        7=>'系统调整',

    ];

    public function grid(): Grid
    {
        return Grid::make(AccountRecord::class, function (Grid $grid) {
            $grid->model()->with("member");
            $grid->column("id","ID");
            $grid->column("member.id","用户ID");
            $grid->column("member.username","用户名");
            $grid->column("member.mobile","手机号");
            $grid->column("trans_type","交易类型")->using(self::TRANS_TYPE,'-');
            $grid->column("trade_type","收支类型")->using([1=>'收入',2=>'支出'],"-")->label();
            $grid->column("amount","交易金额");
            $grid->column("balance","交易后余额");
            $grid->column("remark","备注");
            $grid->column("created_at","创建时间");
            $grid->disableActions();
            $grid->disableRowSelector();
            $grid->disableCreateButton();

        });

    }

}
