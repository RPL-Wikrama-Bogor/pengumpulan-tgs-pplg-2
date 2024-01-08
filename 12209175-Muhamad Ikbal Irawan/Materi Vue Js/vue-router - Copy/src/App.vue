<template>
    <ul>
        <li>
            <a class="active" href="/"><router-link :to="{ name: 'Home' }">Home</router-link></a>
        </li>
        <li>
            <a href="/about"><router-link to="/about">about</router-link></a>
        </li>
    </ul>
  <router-view></router-view>
</template>

<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  border-radius: 100px 50px 100px 50px;
}

li {
  float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 159px;
    text-decoration: none;
  }
  
  li a:hover {
    background-color: #111;
  }

</style>