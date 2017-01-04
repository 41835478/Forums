@extends('backend.layouts.main')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Manage Roles</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search roles" v-model="searchRoleInput">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div id="contentContainer">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Roles</h2>

                    <div class="pull-right">
                        <a href="/admin/access/roles/create" class="btn btn-info btn-xs">
                            <i class="fa fa-plus"></i> Add Role
                        </a>
                    </div>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p>
                        A role is a group set of permissions that can be assigned to users
                    </p>
                    <table class="table">
                        <thead>
                            <tr role="row">
                                <th>Name</th>
                                <th>Description</th>
                                <th>Permissions</th>
                                <th>Controls</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="role in searchedRoles">
                                <td>@{{ role.display_name }}</td>
                                <td>@{{ role.description }}</td>
                                <td>@{{ role.perms_count }}</td>

                                <td>
                                    <a class="btn btn-primary btn-xs" :href="'/admin/access/roles/' + role.id +'/permissions'">
                                        <i class="fa fa-bars"></i> Manage
                                    </a>

                                    <a class="btn btn-danger btn-xs" v-on:click="role.showDelete = true">
                                        <i class="fa fa-bars"></i> Delete
                                    </a>
                                </td><!--END OF BUTTON GROUP-->
                            </tr>
                        </tbody>
                    </table>


                </div>

                <div v-for="role in roles">
                    <modal v-if="role.showDelete">
                        <template slot="header">
                            <h3>Delete @{{ role.display_name }}?</h3>
                        </template>

                        <template slot="body">
                            <p>Are you sure you want to delete this role? Deleting roles could cause serious or even fatal errors to the system.</p>
                        </template>

                        <template slot="footer">
                            <button type="button" class="btn btn-danger" @click="deleteRole(role)">Yes, delete role!</button>
                            <button type="button" class="btn btn-primary" @click="role.showDelete = false">No, go back.</button>
                        </template>
                    </modal>
                </div>
                <!--END OF X-CONTENT-->
            </div>
            <!--END OF X-PANEL-->
        </div>
        <!--END OF CONTENT-CONTAINER-->
    </div>
    <!-- /page content -->
@endsection