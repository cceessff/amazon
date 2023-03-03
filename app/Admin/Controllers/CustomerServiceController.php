<?php

namespace App\Admin\Controllers;

use App\Models\CustomerService;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;

class CustomerServiceController extends AdminController
{
    public function grid(): Grid
    {
        return Grid::make(CustomerService::class,function (Grid $grid){
            $grid->column("id","ID");
            $grid->column("name","名称");
            $grid->column("icon","图标")->image("",50,50);
            $grid->column("contact_info","联系方式");
            $grid->column("url","链接");
            $grid->column("created_at","创建时间");
            $grid->disableViewButton();
        });

    }

    public function form(): Form
    {
        return Form::make(CustomerService::class,function (Form $form){
            $form->text("name","名称")->required();
            $form->image("icon","图标")->dir("images/customer_service")->uniqueName()->required();
            $form->text("contact_info","联系方式")->required();
            $form->text("url","跳转链接")->required();
            $form->footer(function (Form\Footer $footer){
                $footer->disableEditingCheck();
                $footer->disableCreatingCheck();
                $footer->disableViewCheck();
            });
        });
    }

}
