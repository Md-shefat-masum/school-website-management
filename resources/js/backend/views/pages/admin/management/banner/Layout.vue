<template>
    <div>
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h5>
                            {{ page_title }} Infromation Management
                        </h5>
                    </div>
                    <div class="col-lg-6">
                        <!-- <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item active">Sample Page</li>
                        </ol> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends -->
        <div class="container-fluid">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import setup from "./setup";

let page_title = setup.page_title;
export default {
    data: () => ({
        page_title,
        route_prefix: setup.route_prefix,
    }),
    created: function () {
    }
}
</script>

<style></style>
