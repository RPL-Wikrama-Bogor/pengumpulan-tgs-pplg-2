<template>
  <div class="wrap">
    <div class="card bg-info">
      <div class="img-wrap">
        <img :src="'/src/assets/img/' + image" alt="" />
      </div>
      <div class="text-wrap">
        <h3>{{ title }}</h3>
        <slot></slot>
        <div v-html="text"></div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["title", "text", "image"],
};
</script>

<style scoped>
.wrap {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.card {
  width: 600px;
  height: auto;
  padding: 10px;
  border-radius: 10px;
  border: 5px solid;
  display: flex;
  box-shadow: 15px 15px 10px 5px gray;
  margin-top: 40px;
  margin-bottom: 30px;
  flex-direction: row;
}
.img-wrap {
  width: 35%;
  height: 100%;
  position: relative;
}
.text-wrap {
  width: 65%;
  height: 100%;
}
.img-wrap img {
  width: 90%;
  height: 100%;
  /* position: absolute; */
}
</style>
