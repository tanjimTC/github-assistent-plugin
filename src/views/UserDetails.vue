<template>
    <div class="bg-gray-100 bg-opacity-30">
          <div class="lg:w-8/12 lg:mx-auto mb-8">
            <div class="flex flex-wrap items-center p-4 md:py-8">
              <div class="md:w-3/12 md:ml-16">
                <img
                  class="w-20 h-20 md:w-40 md:h-40 object-cover rounded-full
                     border-2 border-gray-600 p-1"
                  :src="singleUser?.avatar_url"
                  alt="profile"
                />
              </div>
              <div class="w-8/12 md:w-7/12 ml-4">
                <div class="md:flex md:flex-wrap md:items-center mb-4">
                  <h2 class="text-3xl inline-block font-light md:mr-2 mb-2 sm:mb-0">
                    {{singleUser?.name
                      ? singleUser.name
                      : singleUser?.login
                      ? singleUser?.login
                      : "Name not available" }}
                  </h2>
                </div>

                <div class="hidden md:block">
                  <div class="flex items-center" >
                    <div class="w-5">
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h1 class="font-semibold ml-2">{{singleUser?.login}}</h1>
                  </div>
                    <p class="flex items-start mt-2" v-if="singleUser.bio">
                      <span class="font-semibold text-gray-700 mr-2 w-7">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                      </span>
                      <span class="text-left">{{singleUser?.bio}}</span>
                    </p>
                 
                    <div class="flex items-center mt-2" v-if="singleUser.blog">
                      <svg class="w-5 h-5 mr-2 text-gray-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                      <span>
                        <a
                          :href="singleUser?.blog"
                          target="_blank"
                          rel="noreferrer"
                          class="underline"
                        >
                          {{singleUser?.blog}}
                        </a>
                      </span>
                    </div>

                    <p class="flex items-center mt-2" v-if="singleUser.location">
                      <span class="font-semibold text-gray-700 ">
                        <svg class="w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                      </span>
                      {{singleUser?.location}}
                    </p>
                 
                </div>
              </div>

              <div class="md:hidden text-sm my-2 text-left">
                <h1 class="font-semibold">{{singleUser?.login}}</h1>
              
                  <p v-if="singleUser?.bio">
                    <span class="font-semibold text-gray-700 mr-1">
                      Bio:
                    </span>
                    {{singleUser?.bio}}
                  </p>
              
                  <p v-if="singleUser?.location">
                    <span class="font-semibold text-gray-700 mr-1">
                      Location:
                    </span>
                    {{singleUser?.location}}
                  </p>
                
              </div>
            </div>
            <span v-if="singleUser">
              <TabContainer :singleUser="singleUser"/>
            </span>
          </div>
        </div>
</template>

<script>
    import TabContainer from '../components/SubPages/TabContainer/TabContainer.vue';

    export default {
        name : "UserDetails",
        components : {TabContainer},
        data(){
            return{
                singleUser : {},
            }
        },
        created: function () {
            jQuery.ajax({
            type:"POST",
            url: github_assistent_obj.ajax_url_tanjim,
            data: {
                action:'git_user_details',
                userLogin : this.$route.params.id,
                nonce: github_assistent_obj.nonce,
            },
            })
            .then(res => {
            this.singleUser = res.data;
            })
            .catch((error) => {
              console.log(error)
            });
        }
    }
</script>

<style  scoped>

</style>