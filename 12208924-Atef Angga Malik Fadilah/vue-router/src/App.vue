<template>
  <ul>
    <li>
      <router-link :to="{ name: 'Home' }">Home</router-link>
    </li>
    <li>
      <router-link to="/About">About</router-link>
    </li>
  </ul>
  <router-view></router-view>
</template>