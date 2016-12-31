@extends('backend.layouts.main')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Manage @{{role.display_name}}</h3>
            </div>
        </div>

        <div id="contentContainer">
            <div class="x_panel">

                <div class="x_title">
                    <h2>@{{ role.display_name }}</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <form :action="'/admin/access/roles/' + role.id" method="put" v-on:submit.prevent="updatePermissions">

                        <div class="form-group">
                            <label for="displayNameInput">Display Name</label>
                            <input type="text" name="display_name" class="form-control" id="displayNameInput" v-model="role.display_name"/>
                        </div>

                        <br />

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Usage</th>
                                    <th>Permission Name</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="permission in permissions">
                                    <td>
                                        <button type="button" class="btn btn-primary" v-if="permission.selected" @click="changePermission(permission)">Granted</button>
                                        <button type="button" class="btn btn-danger" v-else @click="changePermission(permission)">Denied</button>
                                    </td>
                                    <td>@{{ permission.display_name }}</td>
                                    <td>@{{ permission.description }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <br />

                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
                @{{ returnData }}
                <!--END OF X-CONTENT-->
            </div>
            <!--END OF X-PANEL-->
        </div>
        <!--END OF CONTENT-CONTAINER-->
    </div>
    <!-- /page content -->
@endsection