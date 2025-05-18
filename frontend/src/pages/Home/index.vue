<template>
    <main>
        <section class="min-h-[85vh] flex justify-center py-10 lg:py-0 bg-[#fdffe5] ">
            <article class="m-0 p-0 flex-grow container grid grid-cols-1 lg:grid-cols-3 gap-6">
                <img class="my-auto order-1 lg:order-none col-span-2 px-5"
                    src="../../assets/images/imagemLivrosCapa.png">

                <div class="flex flex-col text-center md:text-left justify-center items-center lg:items-start px-5">
                    <h1 class="text-3xl md:text-5xl text-[#86AB89] font-serif">BEST-SELLERS</h1>
                    <hr class="w-24 md:w-32 border-t-2 border-[#86AB89] mt-2 md:mt-3">
                    <p class="text-[#466149] mt-4 text-sm md:text-base">
                        Os livros mais vendidos e comentados! Explore as histórias que estão conquistando leitores no
                        mundo inteiro e encontre sua próxima leitura imperdível.
                    </p>
                    <div class="mt-6">
                        <RouterLink to="/shop"
                            class="border border-[#EA907A] text-[#EA907A] py-2 px-4 hover:bg-[#EA907A] hover:text-white transition duration-300">
                            COMPRAR AGORA
                        </RouterLink>
                    </div>
                </div>
            </article>
        </section>
        
    </main>
  
</template>

<script>
import {RouterLink} from 'vue-router';


export default {
    name: 'home'
    
}
</script>