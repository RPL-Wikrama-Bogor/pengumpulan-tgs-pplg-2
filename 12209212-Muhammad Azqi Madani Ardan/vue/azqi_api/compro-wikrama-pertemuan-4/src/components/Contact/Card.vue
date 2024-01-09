<template>
    <div class="card-contact">
        <img :src="contact.file" :alt="contact">
        <div class="card-contact-description">
            <div class="time">
                Dibuat pada 1
            </div>
            <h4>{{ contact.name }}</h4>
            <p>{{ contact.email }}</p>
        </div>
    </div>
</template>
<script>
export default{
    props: ['contact']
}
</script>
<style>
.card-contact {
    text-align: start;
    box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.05);
    background: white;
    transition: all 0.5s ease;
    margin: 10px 10px;
    display: flex;
    align-items: center;
}

.card-contact img {
    width: 200px;
    height: 200px;
    object-fit: contain;
    padding: 0 0 20px 20px;
}

.card-contact-description {
    padding: 0 20px 0 20px;
}

.card-contact-description .time {
    font-weight: 500;
    font-size: 12px;
    line-height: 17px;
    color: #4F556A;
}

.card-contact-description a {
    font-weight: 900;
    font-size: 15px;
    line-height: 18px;
    text-transform: capitalize;
    color: #042181;
    cursor: pointer;
    text-decoration: none;
}

.card-contact h4 {
    font-weight: 900;
    font-size: 24px;
    line-height: 28px;
    color: #042181;
    margin-bottom: 0px;
    margin-top: 5px;
}

.card-contact p {
    font-weight: 400;
    font-size: 16px;
    line-height: 22px;
    color: #4F556A;
    margin-top: 10px;
    margin-bottom: 5px;
}

@media screen and (max-width: 600px) {
    .row-contact {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        grid-gap: 10px;
    }

    .card-contact {
        flex-direction: column;
        align-items: start;
    }

    .card-contact img {
        width: 100%;
        height: 260px;
        object-fit: contain;
    }
}
</style>