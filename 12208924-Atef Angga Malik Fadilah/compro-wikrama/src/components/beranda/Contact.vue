<template>
    <div class="contact contact-section">
        <h3>Contact</h3>
        <div class="row-contact">
            <CardContact v-for="item in data" :contact="item"></CardContact>
        </div>
    </div>
</template>

<script>
    import "@/assets/Contact.css"
    import CardContact from "@/components/contact/CardContact.vue"
    export default {
        components: {
            CardContact    
        },
        props: ['data']
    }
</script>

