<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use App\Models\UserAddress;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;

class UserAddressController extends AdminController
{
    protected $title="用户地址";
    public function grid(): Grid
    {
        return Grid::make(UserAddress::class, function (Grid $grid) {
            $grid->model()->with("user");
            $grid->column("id", "ID");
            $grid->column("user.username", "用户名");
            $grid->column("name", "收货人");
            $grid->column("mobile", "手机号");
            $grid->column("address", "详细地址");
            $grid->column("zip_code", "邮编");
            $grid->column("created_at", "创建时间");
            $grid->disableViewButton();
        });
    }


}
