<template>
    <div class="container">
        <Contact :data="DataContact"></Contact>
    </div>
</template>


<script>
    import Contact from '@/components/beranda/Contact.vue'
    import { Get } from '@/Api/index.js' 
    export default {
        components: {
            Contact
        },
        data() {
            return {
                DataContact: [],
            }
        },
        async created() {
            const responseContact = await Get('http://127.0.0.1:9000/api/contact')
            this.DataContact = responseContact.data.data;
        },
    }
</script>