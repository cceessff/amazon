<?php

namespace App\Admin\Controllers;

use App\Models\Order;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;

class OrderController extends AdminController
{
    protected $title="订单管理";

    public function grid(): Grid
    {
        return Grid::make(Order::class,function (Grid $grid){
            $grid->model()->orderByDesc("id");
            $grid->disableCreateButton();
            $grid->filter(function (Grid\Filter $filter){
                $filter->equal("member_id","用户ID");
                $filter->equal("username","用户名");
                $filter->equal("order_sn","订单编号");
                $filter->equal("pay_status",'支付状态')->select([''=>'全部',0=>'未支付',1=>'已支付']);
                $filter->equal("status",'状态')->select([''=>'全部',1=>'未完成',2=>'未结算',3=>'已完成',4=>'已冻结']);
            });
            $grid->column("member_id","用户ID");
            $grid->column("username","用户名");
            $grid->column("order_sn","订单编号");
            $grid->column("order_amount","订单金额");
            $grid->column("product_title","商品名称");
            $grid->column("product_image","图片")->image("",100,100);
            $grid->column("product_price","商品价格");
            $grid->column("member_level","会员等级");
            $grid->column("order_profit","订单收益");
            $grid->column("pay_status","支付状态")->display(function ($value){
                return $value===1?"已支付":"未支付";
            });
            $grid->column("group_rule_type","抢单模式");
            $grid->column("status","状态")->using([1=>'未完成',2=>'未结算',3=>'已完成',4=>'已冻结']);
            $grid->column("freeze_time","冻结时间");
            $grid->column("created_at","下单时间");
            $grid->actions(function (Grid\Displayers\Actions $actions){
                $actions->disableDelete();
                $actions->disableView();
                $actions->disableEdit();
                $actions->disableQuickEdit();
            });
        });

    }

}
