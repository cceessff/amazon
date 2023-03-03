<?php

namespace App\Admin\Controllers;

use App\Models\Notice;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;

class NoticeController extends AdminController
{
    protected $title="公告管理";
    public function grid(): Grid
    {
        return Grid::make(Notice::class, function (Grid $grid) {

            $grid->column("id", "ID");
            $grid->column("title", "标题");
            $grid->column("content", "内容");
            $grid->column("created_at", "创建时间");
            $grid->disableViewButton();
            $grid->disableEditButton();
            $grid->showQuickEditButton();
        });


    }

    public function form(): Form
    {
        return Form::make(Notice::class,function (Form $form){
            $form->disableViewButton();
            $form->text("title","标题")->required();
            $form->textarea("content","内容")->required();
            $form->footer(function (Form\Footer $footer){
               $footer->disableCreatingCheck();
               $footer->disableViewCheck();
               $footer->disableEditingCheck();
            });
        });
    }

}
