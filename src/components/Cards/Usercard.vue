<template>
    
      <div class="container mx-auto max-w-xs rounded-lg overflow-hidden shadow-lg my-2 bg-white">
        <div class="relative mb-6">
          <img class="w-full" :src="user.avatar_url" alt="Profile picture" />
          <div
            class="text-center absolute w-full -bottom-8"
          >
            <div
              class="mb-10 bgbg">
              <p class="text-white tracking-wide uppercase text-lg font-bold">
                {{user.login}}
              </p>
            </div>
          </div>
        </div>
        <div class="text-center mb-4">
          <button>
            <router-link :to="'/profile/' + item.login">
              <a class="flex mx-auto py-2 px-4 bg-gray-800 text-white shadow rounded-full">
                View Details 
              </a>
            </router-link>
          </button>
        </div>
      </div>
    
</template>

<script>
    export default {
        name :"Usercard",
        props: ["item"],
        data (){
            return{
                user : this.item
            }
        }
    }
</script>

<style scoped>
.bgbg{
  background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.4) 0%, rgba(0, 0, 0, 0.4));
}
</style>