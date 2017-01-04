<template>
    <div class="v-modal" id="modal">
        <div class="v-modal-dialog">

            <div class="v-modal-header">
                <slot name="header">

                </slot>

            </div>

            <div class="v-modal-body">
                <slot name="body">

                </slot>
            </div>

            <div class="v-modal-footer">
                <slot name="footer">
                    <button type="button" class="btn btn-primary">Okay!</button>
                </slot>
            </div>
        </div>
    </div>
</template>


<script>
    export default{
        data(){
            return{

            }
        },
    }

</script>

<style lang="less">
    .v-modal{
        position: fixed;
        left: 0;
        top: 0;
        bottom: 0;
        right: 0;
        background: rgba(0,0,0,0.8);
        width: 100%;
        height: 100%;
        z-index: 10003;

        .v-modal-dialog{
            background-color: #fff;
            border: 1px solid rgba(0,0,0,0.2);
            border-radius: 6px;
            box-shadow: 0 3px 9px rgba(0,0,0,0.5);
            margin: 50px auto;
            position: relative;
            width: 600px;

            .v-modal-header{
                padding: 10px;
                border-bottom: 1px solid #e5e5e5;
                color: #1b809e;
                h1 h2 h3 h4 {
                    margin: 0;
                    line-height: 1.7;

                }
            }

            .v-modal-body{
                padding: 10px;
            }

            .v-modal-footer{
                padding: 10px;
                text-align: right;
                border-top: 1px solid #e5e5e5;
            }

            .btn-close{

            }
        }
    }
</style>