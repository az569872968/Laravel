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
                  Breadcrumbs::register("admin.project.user", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.project.index");
                          $breadcrumbs->push("工程会员", route("admin.project.user"));
                        });
                  Breadcrumbs::register("admin.project.user_add", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.project.index");
                          $breadcrumbs->push("添加工程会员", route("admin.project.user_add"));
                        });
                  Breadcrumbs::register("admin.project.user_del", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.project.index");
                          $breadcrumbs->push("删除工程会员", route("admin.project.user_del"));
                        });
                  