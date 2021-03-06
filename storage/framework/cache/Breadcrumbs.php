<?php
    Breadcrumbs::register("admin.index", function ($breadcrumbs) {
        $breadcrumbs->push("首页", route("admin.index"));
    });
Breadcrumbs::register("admin.user.manage", function ($breadcrumbs){
        $breadcrumbs->push("用户管理", route("admin.user.manage"));
    });Breadcrumbs::register("admin.permission.index", function ($breadcrumbs) {
                        $breadcrumbs->parent("admin.user.manage");
                        $breadcrumbs->push("权限列表", route("admin.permission.index"));
                    });
                    Breadcrumbs::register("admin.user.index", function ($breadcrumbs) {
                        $breadcrumbs->parent("admin.user.manage");
                        $breadcrumbs->push("用户列表", route("admin.user.index"));
                    });
                    Breadcrumbs::register("admin.role.index", function ($breadcrumbs) {
                        $breadcrumbs->parent("admin.user.manage");
                        $breadcrumbs->push("角色列表", route("admin.role.index"));
                    });
                    Breadcrumbs::register("admin.permission.create", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.permission.index");
                          $breadcrumbs->push("添加权限", route("admin.permission.create"));
                        });
                  Breadcrumbs::register("admin.permission.edit", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.permission.index");
                          $breadcrumbs->push("修改权限", route("admin.permission.edit"));
                        });
                  Breadcrumbs::register("admin.permission.destroy ", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.permission.index");
                          $breadcrumbs->push("删除权限", route("admin.permission.destroy "));
                        });
                  Breadcrumbs::register("admin.user.create", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.user.index");
                          $breadcrumbs->push("添加用户", route("admin.user.create"));
                        });
                  Breadcrumbs::register("admin.user.edit", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.user.index");
                          $breadcrumbs->push("编辑用户", route("admin.user.edit"));
                        });
                  Breadcrumbs::register("admin.user.destroy", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.user.index");
                          $breadcrumbs->push("删除用户", route("admin.user.destroy"));
                        });
                  Breadcrumbs::register("admin.role.create", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.role.index");
                          $breadcrumbs->push("添加角色", route("admin.role.create"));
                        });
                  Breadcrumbs::register("admin.role.edit", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.role.index");
                          $breadcrumbs->push("编辑角色", route("admin.role.edit"));
                        });
                  Breadcrumbs::register("admin.role.destroy", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.role.index");
                          $breadcrumbs->push("删除角色", route("admin.role.destroy"));
                        });
                  Breadcrumbs::register("admin.article.manage", function ($breadcrumbs){
        $breadcrumbs->push("内容管理", route("admin.article.manage"));
    });Breadcrumbs::register("admin.article.index", function ($breadcrumbs) {
                        $breadcrumbs->parent("admin.article.manage");
                        $breadcrumbs->push("文章列表", route("admin.article.index"));
                    });
                    Breadcrumbs::register("admin.project.index", function ($breadcrumbs) {
                        $breadcrumbs->parent("admin.article.manage");
                        $breadcrumbs->push("工程列表", route("admin.project.index"));
                    });
                    Breadcrumbs::register("admin.member.index", function ($breadcrumbs) {
                        $breadcrumbs->parent("admin.article.manage");
                        $breadcrumbs->push("会员管理", route("admin.member.index"));
                    });
                    Breadcrumbs::register("admin.contract.index", function ($breadcrumbs) {
                        $breadcrumbs->parent("admin.article.manage");
                        $breadcrumbs->push("合同列表", route("admin.contract.index"));
                    });
                    Breadcrumbs::register("admin.tender.index", function ($breadcrumbs) {
                        $breadcrumbs->parent("admin.article.manage");
                        $breadcrumbs->push("招投标列表", route("admin.tender.index"));
                    });
                    Breadcrumbs::register("admin.budget.index", function ($breadcrumbs) {
                        $breadcrumbs->parent("admin.article.manage");
                        $breadcrumbs->push("预算", route("admin.budget.index"));
                    });
                    Breadcrumbs::register("admin.settlement.index", function ($breadcrumbs) {
                        $breadcrumbs->parent("admin.article.manage");
                        $breadcrumbs->push("项目结算", route("admin.settlement.index"));
                    });
                    Breadcrumbs::register("admin.article.create", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.article.index");
                          $breadcrumbs->push("添加文章", route("admin.article.create"));
                        });
                  Breadcrumbs::register("admin.article.edit", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.article.index");
                          $breadcrumbs->push("修改文章", route("admin.article.edit"));
                        });
                  Breadcrumbs::register("admin.article.destroy", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.article.index");
                          $breadcrumbs->push("删除文章", route("admin.article.destroy"));
                        });
                  Breadcrumbs::register("admin.project.create", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.project.index");
                          $breadcrumbs->push("添加工程", route("admin.project.create"));
                        });
                  Breadcrumbs::register("admin.project.edit", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.project.index");
                          $breadcrumbs->push("修改工程", route("admin.project.edit"));
                        });
                  Breadcrumbs::register("admin.project.destroy", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.project.index");
                          $breadcrumbs->push("删除工程", route("admin.project.destroy"));
                        });
                  Breadcrumbs::register("admin.member.create", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.member.index");
                          $breadcrumbs->push("添加会员", route("admin.member.create"));
                        });
                  Breadcrumbs::register("admin.member.edit", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.member.index");
                          $breadcrumbs->push("修改会员", route("admin.member.edit"));
                        });
                  Breadcrumbs::register("admin.member.destroy", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.member.index");
                          $breadcrumbs->push("删除会员", route("admin.member.destroy"));
                        });
                  Breadcrumbs::register("admin.contract.create", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.contract.index");
                          $breadcrumbs->push("添加合同文件", route("admin.contract.create"));
                        });
                  Breadcrumbs::register("admin.contract.edit", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.contract.index");
                          $breadcrumbs->push("编辑合同文件", route("admin.contract.edit"));
                        });
                  Breadcrumbs::register("admin.contract.destroy", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.contract.index");
                          $breadcrumbs->push("删除合同文件", route("admin.contract.destroy"));
                        });
                  Breadcrumbs::register("admin.tender.create", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.tender.index");
                          $breadcrumbs->push("添加招标文件", route("admin.tender.create"));
                        });
                  Breadcrumbs::register("admin.tender.edit", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.tender.index");
                          $breadcrumbs->push("修改招标文件", route("admin.tender.edit"));
                        });
                  Breadcrumbs::register("admin.tender.destroy", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.tender.index");
                          $breadcrumbs->push("删除招标文件", route("admin.tender.destroy"));
                        });
                  Breadcrumbs::register("admin.project.summary", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.project.index");
                          $breadcrumbs->push("工程结算文件", route("admin.project.summary"));
                        });
                  Breadcrumbs::register("admin.settlement.create", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.settlement.index");
                          $breadcrumbs->push("添加结算文件", route("admin.settlement.create"));
                        });
                  Breadcrumbs::register("admin.settlement.edit", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.settlement.index");
                          $breadcrumbs->push("修改结算文件", route("admin.settlement.edit"));
                        });
                  Breadcrumbs::register("admin.settlement.destroy", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.settlement.index");
                          $breadcrumbs->push("删除结算文件", route("admin.settlement.destroy"));
                        });
                  Breadcrumbs::register("admin.budget.save", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.budget.index");
                          $breadcrumbs->push("预算保存", route("admin.budget.save"));
                        });
                  Breadcrumbs::register("admin.project.user", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.project.index");
                          $breadcrumbs->push("项目会员", route("admin.project.user"));
                        });
                  Breadcrumbs::register("admin.tender.user", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.tender.index");
                          $breadcrumbs->push("招标会员列表", route("admin.tender.user"));
                        });
                  Breadcrumbs::register("admin.contract.user", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.contract.index");
                          $breadcrumbs->push("会员权限", route("admin.contract.user"));
                        });
                  Breadcrumbs::register("admin.settlement.user", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.settlement.index");
                          $breadcrumbs->push("会员权限", route("admin.settlement.user"));
                        });
                  Breadcrumbs::register("admin.budget.delete", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.budget.index");
                          $breadcrumbs->push("预算删除sheet", route("admin.budget.delete"));
                        });
                  Breadcrumbs::register("admin.homeimage.manage", function ($breadcrumbs){
        $breadcrumbs->push("首页管理", route("admin.homeimage.manage"));
    });Breadcrumbs::register("admin.homeimage.index", function ($breadcrumbs) {
                        $breadcrumbs->parent("admin.homeimage.manage");
                        $breadcrumbs->push("首页图片", route("admin.homeimage.index"));
                    });
                    Breadcrumbs::register("admin.link.index", function ($breadcrumbs) {
                        $breadcrumbs->parent("admin.homeimage.manage");
                        $breadcrumbs->push("友情连接", route("admin.link.index"));
                    });
                    Breadcrumbs::register("admin.video.index", function ($breadcrumbs) {
                        $breadcrumbs->parent("admin.homeimage.manage");
                        $breadcrumbs->push("视频管理", route("admin.video.index"));
                    });
                    Breadcrumbs::register("admin.homeimage.update", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.homeimage.index");
                          $breadcrumbs->push("修改首页图片", route("admin.homeimage.update"));
                        });
                  Breadcrumbs::register("admin.link.create", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.link.index");
                          $breadcrumbs->push("添加友情连接", route("admin.link.create"));
                        });
                  Breadcrumbs::register("admin.link.edit", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.link.index");
                          $breadcrumbs->push("修改友情链接", route("admin.link.edit"));
                        });
                  Breadcrumbs::register("admin.link.destroy", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.link.index");
                          $breadcrumbs->push("删除友情链接", route("admin.link.destroy"));
                        });
                  Breadcrumbs::register("admin.video.create", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.video.index");
                          $breadcrumbs->push("添加视频", route("admin.video.create"));
                        });
                  Breadcrumbs::register("admin.video.edit", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.video.index");
                          $breadcrumbs->push("修改视频", route("admin.video.edit"));
                        });
                  Breadcrumbs::register("admin.video.destroy", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.video.index");
                          $breadcrumbs->push("删除视频", route("admin.video.destroy"));
                        });
                  