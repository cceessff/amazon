<?php

namespace App\Admin\Controllers;

use App\Models\Product;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;

class ProductController extends AdminController
{
    protected $title="产品";
    public function grid(): Grid
    {
        return Grid::make(Product::class,function (Grid $grid){
            $grid->filter(function (Grid\Filter $filter){
                $filter->startWith("title","产品名称");
                $filter->between("price","价格区间");
            });
            $grid->model()->orderByDesc("sort")->orderByDesc("id");
            $grid->column("id","ID");
            $grid->column("title","产品名称");
            $grid->column("image","图片")->image('',100,100);
            $grid->column("price","价格");
            $grid->column("sort","排序")->editable();
            $grid->column("status","状态")->switch();
            $grid->actions(function(Grid\Displayers\Actions $actions){
                $actions->disableView();
            });
        });

    }

    public function form(): Form
    {
        return Form::make(Product::class,function (Form $form){
            $form->hidden("status");
            $form->text("title","产品名称")->required();
            $form->image("image","缩略图")->dir("images/product")->uniqueName()->required();
            $form->number("price","价格")->min(1)->max(999999)->required();
            $form->number("sale_nums","已售数量")->min(0);
            $form->number("sort","排序");
            $form->switch("status","状态");
            $form->textarea("description","产品介绍");
            $form->tools(function(Form\Tools $tools){
                $tools->disableView();
                $tools->disableList();
                $tools->disableDelete();
            });

            $form->footer(function (Form\Footer $footer){
                $footer->disableViewCheck();
                $footer->disableCreatingCheck();
                $footer->disableEditingCheck();
            });

        });

    }

}
