<script>
    export default{
        data(){
            return{
                role: window.role,
                permissions: window.permissions.map(
                function(perm){
                    perm.selected = false
                    role.perms.forEach(function(rolePerm){
                        if (perm.name == rolePerm.name){
                            perm.selected = true
                        }
                    })
                    return perm;
                }),
                returnData: ''
            }
        },

        methods:{
            // click event handler for permission buttons
            changePermission: function(clickedPermission){
                clickedPermission.selected = !clickedPermission.selected;
            },

            updatePermissions: function(e){
                var action = e.target.action;
                var data = {};

                // Sort and get rid of unnecessary data
                data['roleData'] = {id: this.role.id, display_name: this.role.display_name}
                data['permissions'] = []

                // Only send over the id's of permissions the role will have access to
                this.permissions.forEach(function(permission){
                    if (permission.selected){
                        data['permissions'].push(permission.id)
                    }
                });

                // POST request to server to update role
                this.$http.post(action, data).then(function(response){
                    if (response.data.result == 'Success'){
                        toastr.success('Updated role, redirecting back..');
                        window.location = '../';
                    }else{
                        toastr.error('Something went wrong whilst updating the role.')
                    }
                }, function (response){
                    this.returnData = response.data;
                    toastr.error('Failed to update role');
                });

            }
        },
    }

</script>

<style>
    input[type="radio"], input[type="checkbox"] {
    line-height: normal;
    margin: 0;
    };
</style>