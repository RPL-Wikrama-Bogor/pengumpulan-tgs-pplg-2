<template>
    <div class="wrap">
        <div class="card">
            <div class="img-wrap">
                <img :src="'/src/assets/img/'+image" alt="" srcset="">
            </div>
            <div class="text-wrap">
                <h3>{{judul}}</h3>
                <slot></slot>
                <div v-html="text"></div>
            </div>
            <div class="profile-wrap">
                <img :src="'/src/assets/img/'+profile" alt="" srcset="">
            </div>
        </div>
    </div>
</template>

<script>
export default{
    // mengambil data dari luar atau file lain
    props: ['judul', 'text', 'image', 'profile'],
}
</script>

<style scoped>
.wrap {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-bottom: 15px;
}
.card{
    display: flex;
    width: 600px;
    height: auto;
    border-radius: 5px;
    border: 1px solid black;
    transition: all 0.5s ease;
    box-shadow: 0px 10px 30px rgba(0, 0, 0, 0);
}
.img-wrap {
    width: 50%;
    height: auto;
    position: relative;
}
.img-wrap img{
    width: 100%;
    height: 100%;
    display: flex;
    /* position: absolute; */
}
.text-wrap {
    width: 65%;
    height: 100%;
    padding: 10px;
}
.profile-wrap img {
    border-radius: 360%;
    width: 15%;
    height: 15%;
    margin-top: 90px;
}

</style>