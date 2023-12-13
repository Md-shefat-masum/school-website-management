<template>
    <div>

        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h5>
                            Dashboard
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

        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div v-for="(items, index) in titles" :key="index" class="card border-widgets shadow  mb-4">
                <div class="row m-0 ">
                    <div v-for="(item, index2) in items" :key="index2" class="col-xl-3 col-6 xs-width-100">
                        <div class="crm-top-widget card-body">
                            <div class="d-flex">
                                <i :class="`${item.icon} font-primary align-self-center me-3`"></i>
                                <div>
                                    <span class="mt-0">{{ item.title }}</span>
                                    <h4 class="counter">{{ at_at_glance[item.key] }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Container-fluid starts -->
    </div>
</template>

<script>
export default {
    data: ()=>({
        titles: [
            [
                {
                    title: "Total Employee",
                    key:  'employees',
                    icon: 'icon-user',
                },
                {
                    title: "Total Students",
                    key:  'students',
                    icon: 'icon-user',
                },
                {
                    title: "Total Photos",
                    key:  'photos',
                    icon: 'icon-camera',
                },
                {
                    title: "Total Videos",
                    key:  'videos',
                    icon: 'icon-video-camera',
                },
            ],
            [
                {
                    title: "Total Blogs",
                    key:  'blogs',
                    icon: 'icon-harddrives',
                },
                {
                    title: "Total News",
                    key:  'news',
                    icon: 'icon-files',
                },
                {
                    title: "Total Notice",
                    key:  'notice',
                    icon: 'icon-zip',
                },
            ]
        ],
        at_at_glance: {},
    }),
    created: function(){
        this.get_at_a_glance();
    },
    methods: {
        get_at_a_glance: async function(){
            let res = await axios.get('/dashboard/at-a-glance');
            this.at_at_glance = res.data;
        }
    }
}
</script>

<style></style>
