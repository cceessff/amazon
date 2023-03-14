<?php

namespace App\Admin\Controllers;

use App\Admin\Forms\ChangePassword;
use App\Models\Member;
use App\Models\MemberLevel;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Widgets\Modal;

class MemberController extends AdminController
{

    protected $title = "用户管理";


    public function grid(): Grid
    {
        return Grid::make(Member::class, function (Grid $grid) {
            $grid->model()->with(['level']);
            $grid->disableViewButton();
            $grid->column("id", "ID");
            $grid->column("username", "用户名");
            $grid->column("mobile", "手机号码")->display(function ($mobile,Grid\Column $column){
                $countryCode=$column->getOriginalModel()->getAttribute("country_code");
                return "(+{$countryCode})$mobile";
            });
            $grid->column("level.level", "会员等级");
            $grid->column("agent.name", "所属代理");
            $grid->column("order_count", "订单数量");
            $grid->column("invite_code", "邀请码");
            $grid->column("last_login_time", "最后登录时间");
            $grid->column("last_login_ip", "最后登陆IP");
            $grid->column("status", "状态")->switch();
            $grid->column("created_at", "创建时间");
            $grid->actions(function (Grid\Displayers\Actions $actions) {
                $id = $actions->row->getAttribute("id");
                $modal = Modal::make()
                    ->lg()
                    ->title("修改密码")
                    ->body(ChangePassword::make()->payload(['id' => $id]))
                    ->button("修改密码");
                $actions->append($modal);

            });
        });
    }

    public function form(): Form
    {
        return Form::make(Member::class, function (Form $form) {
            $levels = MemberLevel::query()->select(['id', 'title'])->get()->pluck("title", "id")->toArray();
            $form->disableViewButton();
            $form->text("username", "用户名")->required();
            $form->text("nickname", "昵称")->required();
            $form->number("country_code", "电话区号")->required();
            $form->text("mobile", "电话")->required();
            $form->image("icon", "头像")->dir("images/member")->uniqueName()->required();
            if ($form->isCreating()) {
                $form->password("password", "登陆密码")->required();
                $form->password("trade_password", "交易密码")->required();
            }
            $form->select("level_id", "会员等级")->options($levels)->required();
            $form->text("invite_code", "邀请码")->required();
            $form->switch("status", "状态");
            $form->footer(function (Form\Footer $footer) {
                $footer->disableViewCheck();
                $footer->disableEditingCheck();
                $footer->disableCreatingCheck();
            });
        });
    }
}
