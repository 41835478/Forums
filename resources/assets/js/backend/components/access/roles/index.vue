<script type="text/babel">
    export default{
        data(){
            return{
                roles: window.roles,
                searchRoleInput: ''
            }
        },
        components:{

        },

        methods:{
            pressedDelete: function(display_name, id){
                if (prompt ('Are you sure you want to delete ' + display_name + '?\nType YES to delete', '') == "YES"){
                    this.$http.delete('/admin/access/roles/' + id).then(function(response){
                        window.location = '/admin/access/roles';
                    });
                }
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
