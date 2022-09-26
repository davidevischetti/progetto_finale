<template>
    <div id="myFooter" class="text-light text-center">
        <section id="footer_up">
            <div class="container">
                <div class="row">
                    <!-- Autori -->
                    <div class="col-12 d-flex justify-content-between py-4">
                        <div class="author_card my_text_style" v-for="(author, i) in authors" :key="i">
                            <h6>{{author.name}}</h6>
                            <div><a :href="author.github">GitHub</a></div>
                            <div><a :href="author.linkedin">LinkedIn</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Diritti riservati -->
                        <div class="col-12 py-4">
                            <div>Ⓒ Copyright 2022 <span id="deliveboo">Deliveboo</span> by Boolean <strong>Team 5</strong>. Tutti i diritti sono riservati.</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default{
    name: 'Footer',
    data(){
        return {
            authors: [
                {
                    name: "Davide Vischetti",
                    github: "https://github.com/davidevischetti",
                    linkedin: "https://www.linkedin.com/in/davidevischetti",
                },
                {
                    name: "Vincenzo Di Nardo",
                    github: "https://github.com/Vincedinardo21",
                    linkedin: "https://www.linkedin.com/in/vincenzo-di-nardo-23b12824b/",
                },
                {
                    name: "Giulia Valente",
                    github: "https://github.com/GiulsV",
                    linkedin: "https://www.linkedin.com/in/giuliavalente-dev/",
                },
                {
                    name: "Matteo Pellegrini",
                    github: "https://github.com/MatteoPellegrinii",
                    linkedin: "https://www.linkedin.com/in/matteo-pellegrini-a68906245/",
                },
                {
                    name: "Alessandro Fulco",
                    github: "https://github.com/AlessandroFulco",
                    linkedin: "https://www.linkedin.com/in/alessandro-fulco-dev/",
                },
            ]
        }
    }
}
</script>

<style lang="scss" scoped>
    #myFooter{
        background-color:  #2F4858;
        height: 200px;
    }
    .my_text_style{
        text-align: left;

        a{
            color: rgb(177, 174, 174);
            text-decoration: none;
        }
    }
    #deliveboo{
        color: #d99784;
    }
    #footer_up{
        border-bottom: 1px solid gray;
    }
</style>
