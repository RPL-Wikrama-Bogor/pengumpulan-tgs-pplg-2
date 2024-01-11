<template>
    <div class="wrap">
        <div class="card">
            <div class="img-wrap">
                <img :src="'/src/assets/img/' + image" alt="" srcset="">
                <div class="img-profile">
                    <img :src="'/src/assets/img/' + profile" alt="" srcset="">
                </div>
            </div>
            <div class="text-wrap">
                <h3>{{ heading }}</h3>
                <p>{{ text1 }}</p>
                <p>{{ text2 }}</p>
                <div class="card-info">
                    <p>{{ name }}</p>
                    <p>{{ date }}</p>
                </div>
                <slot></slot>
                <div v-html="text"></div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['heading', 'text1', 'text2', 'image', 'profile', 'date', 'name'],
}
</script>

<style scoped>
.wrap {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-bottom: 25px;
    margin-top: 9em;
}

.card {
    width: 800px;
    height: 300px;
    border-radius: 5px;
    display: flex;
    border-radius: 10px;
    box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.5);
    /* min-height: ;
  min-width: 600px;
  box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.5);
  border-radius: 10px;
  background: white;
  transition: all 0.5s ease;
  margin: 10px 10px;
  font-family: sans-serif; */
}

.img-wrap {
    width: 35%;
    height: 100%;
    /* position: relative; */
}

.text-wrap {
    width: 65%;
    height: 100%;
    padding: 50px;
    margin-top: none;
}

.img-wrap img {
    width: 100%;
    height: 100%;
    border-radius: 10px 0px 0px 10px;
    /* position: absolute; */
}

.card-info {
    margin-left: 5em;
    font-size: 13px;
    margin-top: 20px;
}

.img-profile {
    width: 60px;
    margin-top: -130px;
    margin-left: 20em;
}

.img-profile img {
    border-radius: 50px;

}</style>