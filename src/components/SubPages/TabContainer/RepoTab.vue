<template>
    <div className="container mx-auto p-4">
      <h1 className="text-center text-4xl">
        Repositories of {{singleUser?.login}}
      </h1>
      <p className="text-center text-gray-800 mb-8">
        <a
          className="underline hover:no-underline"
          :href="singleUser?.html_url"
          target="_blank"
          rel="noreferrer"
        >
          View Git Profile
        </a>
      </p>

      <div className="grid gap-4 gap-y-8 md:grid-cols-2 lg:grid-cols-3 mb-16" v-if="repoUrl">
        <RepoCard v-for="(item, index) in repoUrl" :key="index" :repoUrl="item"/>
      </div>

    </div>
</template>

<script>
import RepoCard from '../../Cards/RepoCard.vue';

    export default {
        components: { RepoCard },
        name : "RepoTab",
        props : ["singleUser"],
        data () {
            return{
                repoUrl : [],
            }
        },
        created : function () {
            jQuery.ajax({
            type:"POST",
            url: github_assistent_obj.ajax_url_tanjim,
            data: {
                action:'git_user_repos',
                userLogin : this.$route.params.id,
                nonce: github_assistent_obj.nonce,
            },
            })
            .then(res => {
            this.repoUrl = res.data;
            })
            .catch((error) => {
              console.log(error)
            });
        },
    }
</script>

<style  scoped>

</style>