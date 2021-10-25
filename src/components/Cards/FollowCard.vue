<template>
     <div className="bg-white rounded-md overflow-hidden border shadow-md">
      <div className="p-4 flex flex-col h-full justify-between">
        <div>
          <img className="w-full" :src="followData.avatar_url" alt="Follower Avatar" />

          <div className="mt-4">
            <h2 className="text-2xl text-grbg-gray-800">
              {{followData?.name || followData?.login}}
            </h2>
          </div>
        </div>
        <div>
          <a
            className="no-underline"
            :href="followData?.html_url"
            target="_blank"
            rel="noreferrer"
          >
            <button className="flex items-center justify-center text-white bg-gray-800 p-4 rounded-md w-full uppercase">
              View Git Profile
              <div className="w-8">
                <img
                  src="https://github-api-project-gilt.vercel.app/images/3456772.png"
                  alt="git icon"
                  className="ml-2 border-0"
                />
              </div>
            </button>
          </a>
        </div>
      </div>
    </div>
</template>

<script>
    export default {
        name: 'FollowCard',
        props : ['followData'],
    }
</script>

<style scoped>

</style>