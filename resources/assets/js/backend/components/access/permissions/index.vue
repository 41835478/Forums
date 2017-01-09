<template>

</template>

<script type="text/babel">
    import {Errors} from '../../../../scripts/errors';
    export default{
        data(){
            return{
                permissions: window.permissions,
                managing: [],
                showManage: false,
                creating: [],
                showCreate: false,
                deleting: [],
                showDelete: false,
                errors: new Errors(),
                searchPermissionInput: ''
            }
        },

        methods: {
            showManageModal(permission){
                this.managing = JSON.parse(JSON.stringify(permission));
                this.showManage = true;
            },

            showDeleteModal(permission){
                this.showDelete = true;
                this.deleting = permission;
            },

            showCreateModal(){
                this.showCreate = true;
                this.creating = {name: '', display_name: '', description: ''}
            },

            hideManage(){
                this.managing = [];
                this.showManage = false;
            },

            createPermission(){
                this.$http.post('/admin/access/permissions', this.creating).then(
                    function (response){
                        if (response.data.result == 'Success'){
                            toastr.success('Created new permission!');
                            this.permissions.push(this.creating);
                            this.showCreate = false;
                            this.creating = [];
                        }
                    },
                    function (response){
                        this.errors.update(response.data);
                    }
                )
            },

            submitChanges(){
                this.$http.post('/admin/access/permissions/' + this.managing.id, this.managing).then(
                    function(response){
                        if (response.data.result == 'Success'){
                            toastr.success('Updated permission.');
                            this.updatePermissionData(this.managing);
                            this.hideManage();
                        }
                    },
                    function(response){
                        this.errors.update(response.data);
                    }
                )
            },

            updatePermissionData(permissionData){
                this.permissions = this.permissions.map(
                    function(permission){
                        if (permission.id == permissionData.id){
                            permission = permissionData;
                        }
                        return permission;
                    }
                )
            },

            deletePermission(){
                this.$http.delete('/admin/access/permissions/' + this.deleting.id).then(
                    function (response){
                        if (response.data.result == 'Success'){
                            toastr.success('Deleted permission');

                            // Delete the permission record from the vue instance
                            self = this;
                            this.permissions = this.permissions.filter(
                                function(perm){
                                    return perm.id != self.deleting.id;
                                }
                            )

                            this.showDelete = false;
                            this.deleting = [];
                        }
                    }
                )
            },
        },

        computed: {
            searchedPermissions(){
                self = this;
                return this.permissions.filter(function (permission) {
                    return permission['display_name']
                            .toUpperCase()
                            .includes(
                                    self.searchPermissionInput.toUpperCase()
                            );
                })
            }
        }
    }

</script>

<style>

</style>