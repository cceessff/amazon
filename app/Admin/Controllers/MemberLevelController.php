<?php

namespace App\Admin\Controllers;

use App\Models\MemberLevel;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;

class MemberLevelController extends AdminController
{
    protected $title="会员等级";

    public function grid()
    {
        return Grid::make(MemberLevel::class,function (Grid $grid){
            $grid->column("level","等级");
            $grid->column("title","名称");
            $grid->column("icon","图标")->image('',50,50);
            $grid->column("image","图片")->image('',50,50);
            $grid->column("commission_rate","佣金比例");
            $grid->column("order_num","订单数量");
            $grid->column("upgrade_amount","升级金额");
            $grid->column("min_order_price","最小匹配金额");
            $grid->column("max_order_price","最大匹配金额");
            $grid->column("created_at","创建时间");
            $grid->actions(function (Grid\Displayers\Actions $actions){
               $actions->disableView();
            });
        });


    }

    public function form()
    {
        return Form::make(MemberLevel::class,function (Form $form){
            $form->text("level","等级")->required();
            $form->text("title","名称")->required();
            $form->image("icon","图标")->dir("images/member_level/icon")->uniqueName()->required();
            $form->image("image","图片")->dir("images/member_level/image")->uniqueName()->required();
            $form->number("commission_rate","佣金比例")->required();
            $form->number("order_num")->required()->help(" 当前等级允许的最大订单数量");
            $form->number("upgrade_amount","升级余额")->required();
            $form->number("min_order_price","最小匹配金额");
            $form->number("max_order_price","最大匹配金额");
            $form->footer(function (Form\Footer $footer){
                $footer->disableEditingCheck();
                $footer->disableCreatingCheck();
                $footer->disableViewCheck();
            });
        });

    }
}
