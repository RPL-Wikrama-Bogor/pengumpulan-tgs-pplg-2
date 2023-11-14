<template>
  <ul>
    <li>
      <router-Link :to="{name: 'Home'}">Home</router-Link>
      <router-Link to="/about">About</router-Link>
    </li>
  </ul>
  <router-View></router-View>
</template>