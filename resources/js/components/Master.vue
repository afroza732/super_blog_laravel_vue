<template>
    <div>
        <Navbar></Navbar>
        <Sidebar></Sidebar>
        <br />
        <div class="content-wrapper">
            <div class="content">
                <div class="container-fluid">
                    <router-view> </router-view>
                </div>
            </div>
        </div>
        <Footer></Footer>
    </div>
</template>

<script>
import Navbar from "../components/includes/Navbar.vue";
import Footer from "../components/includes/Footer.vue";
import Sidebar from "../components/includes/Sidebar.vue";
export default {
    components: {
        Navbar: Navbar,
        Sidebar: Sidebar,
        Footer: Footer
    }
};
</script>
