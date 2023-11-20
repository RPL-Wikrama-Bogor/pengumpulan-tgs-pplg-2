<template>
  <div class="card-service">
    <img src="service.file" alt="service.title" />
    <h4>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus excepturi aut illum optio eaque omnis, perspiciatis sit explicabo commodi eligendi soluta adipisci iusto, dolore consequuntur minima cumque voluptatem quae tempora.
    </h4>
    <p>
      Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aut neque assumenda suscipit quod dolore quas, consectetur veritatis in, eaque accusamus dolores aliquam praesentium voluptate incidunt aspernatur natus necessitatibus
      recusandae aperiam?
    </p>
  </div>
</template>
<script>
  export default{
    props: ['service']
  }
</script>
<style scope>
.card-service {
  text-align: start;
  min-height: 306px;
  padding: 30px 30px 0 30px;
  box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.25);
  border-radius: 60px 0 0 0;
  background: white;
  transition: all 0.5s ease;
  margin: 10px 10px;
}
.card-service img {
  width: 100px;
}
.card-service h4 {
  font-size: 18px;
  line-height: 30px;
  color: #343b4e;
}
.card-service p {
  font-weight: 400;
  color: #827f8d;
  margin: 0 0 10px 0;
}
</style>
