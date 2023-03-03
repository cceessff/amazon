<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;

class ArticleController extends AdminController
{
    protected $title="文章管理";
    public function grid(): Grid
    {
        return Grid::make(Article::class, function (Grid $grid) {
            $grid->column("id", "ID");
            $grid->column("title", "标题");
            $grid->column("kind", "文章类型");
            $grid->column("image", "图片")->image("", 100, 100);
            $grid->column("sort", "排序");
            $grid->column("status", "状态")->switch();
            $grid->column("created_at", "创建时间");
            $grid->disableViewButton();
        });
    }

    public function form(): Form
    {
        return Form::make(Article::class, function (Form $form) {
            $form->disableViewButton();
            $form->disableDeleteButton();
            $form->text("title", "标题")->required();
            $form->image("image", "图片")->dir("images/article")->uniqueName()->required();
            $form->select("kind", "类型")->options([
                1 => "公司简介",
                2 => "关于我们",
                3 => "规则说明",
                4 => "佣金规则",
                5 => "代理合作",
                6 => "福利奖励",
                7 => "服务条款",
                8 => "隐私政策",
            ])->required();
            $form->number("sort", "排序")->required();
            $form->switch("status", "状态");
            $form->editor("content", "内容");
            $form->footer(function (Form\Footer $footer){
                $footer->disableEditingCheck();
                $footer->disableViewCheck();
                $footer->disableCreatingCheck();
            });
        });
    }

}
