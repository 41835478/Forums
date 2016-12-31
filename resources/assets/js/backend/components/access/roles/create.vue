<script type="text/babel">
    import {Errors} from '../../../../scripts/errors';
    export default{
        data(){
            return{
                role: {
                    name: '',
                    display_name: '',
                    description: ''
                },
                permissions: window.permissions.map(function(permission){
                    permission.selected = false;
                    return permission;
                }),

               errors: new Errors(),


            }
        },

        methods:{
            changePermission: function(clickedPermission){
                clickedPermission.selected = !clickedPermission.selected;
            },

            submitRole: function(e){
                var action = e.target.action;
                var data = {};

                data['role'] = this.role;
                data['permissions'] = [];


                // Only send over the id's of permissions the role will have access to
                this.permissions.forEach(function(permission){
                    if (permission.selected){
                        data['permissions'].push(permission.id)
                    }
                });

                this.$http.post(action, data).then(function(response){
                    if (response.data.result == 'Success'){
                        toastr.success('Role created!');
                        window.location = '/admin/access/roles';
                    }else{
                        toastr.error('Failed to create role..')
                    }
                }, function (response){
                    this.errors.update(response.data);
                    toastr.error('Failed to create role');
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