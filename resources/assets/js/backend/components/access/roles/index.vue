<script type="text/babel">
    export default{
        data(){
            return{
                // add showDelete property to roles
                roles: window.roles.map(
                    function (role){
                        role.showDelete = false;
                        return role;
                    }
                ),
                searchRoleInput: ''
            }
        },
        components:{

        },

        methods:{
            deleteRole: function(role){
                role.showDelete = false;

                this.$http.delete('/admin/access/roles/' + role.id).then(function(response){
                    window.location = '/admin/access/roles';
                });
            }
        },
        computed:{
            searchedRoles: function(){
                self = this;
                return this.roles.filter(function(role){
                    return role['display_name']
                        .toUpperCase()
                        .includes(
                            self.searchRoleInput
                            .toUpperCase()
                        );
                })
            }
        }
    }

</script>
