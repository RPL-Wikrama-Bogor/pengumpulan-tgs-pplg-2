<template>
  <div class="contact contact-section">
    <h3>contact</h3>
    <div class="row-contact">
      <CardContact v-for="item in data" :contact="item"></CardContact>
    </div>
  </div>
</template>

<script>
    import "@/assets/contact.css"
    import CardContact from "@/components/contact/CardContact.vue";
        export default {
    components: {
        CardContact,
    },
    props: ["data"],
    };
</script>
