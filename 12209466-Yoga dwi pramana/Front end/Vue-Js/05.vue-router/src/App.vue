<template>
  <ul>
    <li>
      <router-link :to="{name: 'Home'}" >Home</router-link>
      <router-link to="/about" >About</router-link>
      <!-- <a href="/">Home</a>
      <a href="/about">About</a> -->
    </li>
  </ul>
  <router-view></router-view>
</template>