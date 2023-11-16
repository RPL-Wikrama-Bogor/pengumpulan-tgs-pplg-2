<template>
  <ul>
    <li>
      <!-- berfungsi mau kemana -->
      <Router-Link :to="{name : 'Home'}">Home</Router-Link>
      <Router-Link to="/About">About</Router-Link>
    </li>
  </ul>
  <!-- komponen mana yg dipanggil -->
  <router-view></router-view>
</template>