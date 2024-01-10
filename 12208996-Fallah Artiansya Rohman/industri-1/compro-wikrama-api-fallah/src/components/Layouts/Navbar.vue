<template>
    <div>
        <div class="topnav container " :class="{ responsive: navbarActive}">
          <div class="logo">
            <div><img src="@/assets/img/logo.png" alt="logo"></div>
            <a class="icon">
              <img src="@/assets/img/hamburger.svg" @click="navbar" alt="hamburger">
            </a>
          </div>
          <div class="menu">
            <ul>
                <li><router-link :to="{name:'home'}">Home</router-link></li>  
                <li><router-link to="/service">Service</router-link></li>
                <li><router-link to="/portofolio">Portofolio</router-link></li>  
                <li><router-link to="/blog">Blog</router-link></li>
        </ul> 
        
          </div>
        </div>
      </div>
    </template>
    <script>
    export default {
        data(){
            return{
               navbarActive : false 
            }
        },
        methods:{
            navbar(){
                if (this.navbarActive){
                    this.navbarActive = false;
                } else{
                    this.navbarActive = true;
                }
           3
            }
        }
    }
    </script>
    <style scope>
    @import url(https://fonts.googleapis.com/css?family=Raleway:400,500,800);
    .topnav{
      overflow: hidden;
      background-color: white;
      display: flex;
      align-items: center;
      justify-content: space-between;
      font-family: 'Raleway', Arial, Helvetica, sans-serif;
      text-align: center;
      text-transform: uppercase;
      font-weight: 500;
    }
    .topnav * {
        box-sizing: border-box;
    }
    .topnav li{
        display: inline-block;
        list-style: outside none none;
        margin: 0 1.5em;
        padding: 0;
    }
    .topnav a{
      float: left;
      color: black;
      text-align: center;
      text-decoration: none;
      font-size: 17px;
      position: relative;
      letter-spacing: 1px;
      padding: 0.5em 0;
    }
    .topnav a:before,
    .topnav a:after{
        position: absolute;
        -webkit-transition: all 0.35s ease;
        transition:all 0.35s ease ;
    }
    .topnav a:before{
        bottom: 0;
        display: block;
        height: 3px;
        width: 0%;
        content: "";
        background-color: #2980b9;
    }
    .topnav a:after{
        left: 0;
        top: 0;
        padding: 0.5em 0;position: absolute;
        content: attr(data-hover);
        color: #ffff;
        white-space: nowrap;
        max-width: 0%;
        overflow: hidden;
    }
    .topnav a:hover::before{
        opacity: 1;
        width: 100%;
    }
    .topnav a:hover::after{
        max-width: 100%;
    }
    .topnav a:hover {
      border-bottom: 2px solid #4c55c4;
    }
    
    .topnav a:hover{
      color: black;
    }
    
    .topnav a.active{
      background-color: #04AA6D;
      color: white;
    }
    
    .topnav .icon{
      display: none;
    }
    
    .logo{
      display: flex;
      justify-content: space-between;
      max-width: 100%;
      padding: 10px;
    }
    
    @media screen and (max-width: 600px){
      .topnav{
        display: block;
        padding: 0;
      }
    
      .topnav .menu a{
        display: none;
      }
    
      .topnav a.icon{
        float: right;
        display: block;
      }
    
      @media screen and (max-width: 600px){
        .topnav.responsive{
          position: relative;
          display: block;
        }
    
        .topnav.responsive a{
          float: none;
          display: block;
          text-align: left;
                }
    
      }
    }
    </style>