<template>
<div class="wrap">
    <div class="card bg-secondary">
        <div class="img-wrap">
            <img :src="'/src/assets/img/' +image" alt="" srcset="">
        </div>
        <div class="text-wrap">
            <h3>{{ judul }}</h3>
      <div v-html="text"></div>
      <div class="profile-wrap">
        <img :src="'/src/assets/img/' +profile" alt="">
        <h5>{{ name }}</h5>
      </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    // mengambill data dari luar atau file lain
    // nama props == nama bind attribute dicomponent nya tempat data dikirim
    props: ['judul', 'text', 'image', 'name', 'profile'],
}
</script>

<style scoped>
.wrap {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-bottom: 25px;
}
.card {
    width: 600px;
    height: auto;
    border-radius: 5px;
    border: 1px solid black;
    display: flex;
    transition: all 0.5s ease;
    box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.5);
}
.img-wrap {
    width: 50%;
    height: auto;
    position: relative;

}
.text-wrap {
    width: 65%;
    height: 100%;
    padding: 10px;
}
.img-wrap img {
    width: 100%;
    height: 100%;
    display: flex;
    /* position: absolute; */
}

.profile-wrap img {
    border-radius: 360%;
    width: 15%;
    height: 15%;
    margin-top: 10px;
}
.profile-wrap h5 {
    margin-top: -2rem;
    margin-left: 4rem;
}
</style>