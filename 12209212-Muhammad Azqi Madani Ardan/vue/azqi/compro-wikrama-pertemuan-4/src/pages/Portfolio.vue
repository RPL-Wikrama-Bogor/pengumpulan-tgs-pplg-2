<template>
    <div class="container">
        <div class="portofolio">
            <h3>Portofolio Kami</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore facilis consequatur neque eos dolorum distinctio quasi deserunt,</p>
            {{ DataCategories }}
            <div class="category">
                <span v-for= "category in DataCategories" @click="filter(category.id)">{{ category.title }}</span>
                
            </div>
            <div class="row-portfolio">
                <Card v-for="item in DataPortfolio" :portfolio="item"></Card>
            </div>
        </div>
    </div>
</template>

<script>

import Card from '@/components/Portfolio/Card.vue';

import {Get} from '@/Api/index.js'
export default{
    components:{
        Card
    },
    data(){
        return{
            DataPortfolio: [],
            DataCategories: []
      }
    },
    beforeCreate(){
        console.log(document.querySelector('.portofolio'));
        console.log(this.DataPortfolio);
        console.log("beforeCreate");
    },
    async created(){
        const responsePortfolio = await 
        Get('portfolio');
        console.log(responsePortfolio);
        console.log(responsePortfolio.status);
        this.DataPortfolio = responsePortfolio.data.data;
        console.log('created');
        
        const responseCategories = await Get ('categories');
        console.log(responseCategories);
        this.DataCategories = responseCategories.data;
    },
    methods:{
        async filter(id){
            const responsePortfolio = await
            Get(`portfolio?category_id=${id}`);
            this.DataPortfolio = responsePortfolio.data.data;
        }
        // jagajaga
    },
    beforeMount(){
        console.log('beforeMount');
    },
    mounted(){
        console.log('mounted');
    }
}
</script>

<style>
.category{
    margin: 10px 0 35px 0;
    display: block;
    flex-wrap: wrap;
}

.category span{
    background-color: lightblue;
    padding: 10px 15px;
    font-weight: 500;
    border-radius: 20px;
    margin: 5px;
    cursor: pointer;
}

.category span:hover{
    box-shadow: 0px 10px 10px blue;
}

.row-portfolio{
    display: grid;
    grid-template-columns: repeat(3,1fr);
    grid-gap: 10px;
}

.portofolio{
    margin-top: 10px;
}

.portfolio h4{
    margin-top: 10px;
    font-weight: 900;
    font-size: 30px;
    line-height: 35px;
    margin-bottom: 0;
    color: darkblue;
}

.portofolio p{
    font-weight: 900;
    font-size: 14px;
    line-height: 20px;
    color: gray;
    max-width: 680px;
    margin: auto;
    margin-top: 14px;
    margin-bottom: 25px;
    text-align: center;
}

.portfolio p span{
    color:green;
}

@media screen and (max-width:600px){
    .row-portfolio{
        display: grid;
        grid-template-columns: repeat(1,1fr);
        grid-gap: 10px;
    }

    .portfolio h4{
        font-size: 20px;
    }
}



</style>