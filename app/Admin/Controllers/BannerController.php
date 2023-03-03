<?php

namespace App\Admin\Controllers;

use App\Models\Banner;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;

class BannerController extends AdminController
{
    protected $title="轮播管理";
    public function grid(): Grid
    {
        return Grid::make(Banner::class,function (Grid $grid){
            $grid->column("id","ID");
            $grid->column("title","标题");
            $grid->column("image","图片")->image("",100,100);
            $grid->column("url","链接");
            $grid->column("sort","排序");
            $grid->column("status","状态")->switch();
            $grid->column("created_at","创建时间");
            $grid->disableViewButton();
        });
    }

    public function form(): Form
    {
        return Form::make(Banner::class,function (Form $form){
            $form->text("title","标题")->required();
            $form->text("url","链接")->required();
            $form->image("image","图片")->dir("images/banner")->uniqueName()->required();
            $form->number("sort","排序")->required();
            $form->switch("status","状态");
            $form->footer(function (Form\Footer $footer){
                $footer->disableViewCheck();
                $footer->disableCreatingCheck();
                $footer->disableEditingCheck();
            });
        });

    }
}
