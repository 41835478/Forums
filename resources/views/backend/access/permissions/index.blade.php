@extends('backend.layouts.main')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Manage Permissions</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search permissions" v-model="searchPermissionInput">
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
                        <a href="#" class="btn btn-info btn-xs" @click="showCreateModal()">
                            <i class="fa fa-plus"></i> Add Permission
                        </a>
                    </div>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p>
                        A permissions allows selected roles to gain access to a specific task or ability
                    </p>
                    <table class="table">
                        <thead>
                        <tr role="row">
                            <th>Name</th>
                            <th>Display Name</th>
                            <th>Description</th>
                            <th>Controls</th>
                        </tr>
                        </thead>

                        <tbody>
                            <tr v-for="permission in searchedPermissions">
                                <td>@{{ permission.name }}</td>
                                <td>@{{ permission.display_name }}</td>
                                <td>@{{ permission.description }}</td>
                                <td>
                                    <a class="btn btn-primary btn-xs" @click="showManageModal(permission)">
                                        <i class="fa fa-bars"></i> Manage
                                    </a>

                                    <a class="btn btn-danger btn-xs" @click="showDeleteModal(permission)">
                                        <i class="fa fa-bars"></i> Delete
                                    </a>
                                </td><!--END OF BUTTON GROUP-->
                            </tr>
                        </tbody>
                    </table>

                    <!-- Manage modal -->
                    <modal v-if="showManage">
                        <template slot="header">
                            <h3>Manage @{{ managing.display_name }}</h3>
                        </template>

                        <template slot="body">
                            @include('backend/access/permissions/_createForm', ['data' => 'managing'])
                        </template>

                        <template slot="footer">
                            <button type="button" class="btn btn-primary" @click="submitChanges">Save changes</button>
                            <button type="button" class="btn btn-danger" @click="hideManage">Cancel</button>
                        </template>
                    </modal>

                    <modal v-if="showDelete">
                        <template slot="header">
                            <h3>Delete @{{ deleting.name }}?</h3>
                        </template>

                        <template slot="body">
                            <p>Are you sure you want to delete this permission? Deleting permissions could cause serious or even fatal errors to the system.</p>
                        </template>

                        <template slot="footer">
                            <button type="button" class="btn btn-danger" @click="deletePermission()">Yes, delete permission.</button>
                            <button type="button" class="btn btn-primary" @click="showDelete = false">No, go back.</button>
                        </template>
                    </modal>

                    <modal v-if="showCreate">
                        <template slot="header">
                            <h3>Create permission</h3>
                        </template>

                        <template slot="body">
                            @include('backend/access/permissions/_createForm', ['data' => 'creating'])
                        </template>

                        <template slot="footer">
                            <button type="button" class="btn btn-primary" @click="createPermission()">Create</button>
                            <button type="button" class="btn btn-danger" @click="showCreate = false">Back</button>
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