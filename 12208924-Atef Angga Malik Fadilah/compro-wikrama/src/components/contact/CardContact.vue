<template>
    <div class="card-contact">
        <div class="card-contact-description">
            <h4>{{ name }}</h4>
            <ul>
                <li>{{ email }}</li>
                <li>{{ phone }}</li>
                <li>{{ message }}</li>
            </ul>
            <a href="">Go To WhatsApp</a>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['contact']
    }
</script>

<style scoped>
    .card-contact {
    text-align: start;
    min-height: 306px;
    padding: 30px 30px 0 30px;
    box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
    border-radius: 60px 0px 60px 0px;
    background: white;
    transition: all 0.5s ease;
    margin: 10px 10px;
    }
    .card-contact img {
    width: 100px;
    }
    .card-contact h4 {
    font-size: 18px;
    line-height: 30px;
    color: #343b4e;
    }
    .card-contact p {
    font-weight: 400;
    color: #827f8d;
    margin: 0 0 10px 0;
    }
</style>