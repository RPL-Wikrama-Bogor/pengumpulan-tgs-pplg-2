<template>
    <div class="container">
        <div class="portofolio">
            <h3>Portofolio Kami</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
            {{ DataCategories }}
                <div class="category">
                    <span v-for="category in DataCategories" @click="{{item.id}}">{{category.title}}</span>
                    <span>Desain</span>
                    <span>Mobile</span>
                </div>
                <div class="row-portofolio">
                    <Card v-for="item in DataPortfolio" :portfolio="item"></Card>
            </div>
        </div>
    </div>
</template>
<script>
import Card from '@/components/Portfolio/Card.vue';
import { Get } from '@/Api/index.js';
export default {
    components: {
        Card
    },
    methods:{
        filter(id) {
            alert(id){
                const response = await 
                Get('http://localhost:9000/api/portfolio/category_id' + id);
                this.DataPortfolio = response.data.data;
            }
        }
    },
    beforeCreate(){
        console.log(document.querySelector('.portfolio'));

        console.log(this.DataPortfolio);
        console.log('beforeCreate');
    },
    created(){
        console.log(document.querySelector('.portfolio'));
        console.log(this.DataPortfolio);
        console.log('create');
    },
    beforeMount(){
        console.log('beforemount');
    },
    mounted(){
        console.log('mounted');
    },
    data(){
        return{
            DataPortfolio: [],
            DataCategories: []
        }
    },
    async created(){
        const response = await Get('http://localhost:9000/api/portfolio');
        // console.log(response);
        // console.log(response.status);
        this.DataPortfolio = response.data.data;
        // console.log(this.DataPortfolio);
        const responseCategories = await Get('http//127.0.0.1:9000/api/categories');
        console.log(responseCategories.data);
        this.DataCategories = responseCategories.data;

    }
}
</script>
<style scoped>
.category span{
    background-color: #bdcdff;
    padding: 10px 15px;
    font-weight: 500;
    border-radius: 20px;
    margin: 5px;
    cursor: pointer;
}

.row-portofolio {
    display: grid;
    grid-template-columns: repeat(3 ,1fr);
    grid-gap: 10px;
}
.portofolio {
    margin-top: 10px;
}

.portofolio h4{
    margin-top: 10px;
    font-weight: 900;
    font-size: 30px;
    line-height: 35px;
    margin-bottom: 0;
    color: #042181;
}
.portofolio p{
    font-weight: 900;
    font-size: 14px;
    line-height: 20px;
    color: #4F556A;
    max-width: 680;
    margin: auto;
    margin-top: 14px;
    margin-bottom: 25px;
    text-align: center;
}
.portofolio p span{
    color:gray;


  @media screen and (max-width: 600px) {
    
    .row-portofolio{
        display:grid;
        grid-template-columns:repeat(1, 1fr);
        grid-gap:10px
    }
    .portfolio h4{
        font-size:20px;
    }
  }
}
</style>
