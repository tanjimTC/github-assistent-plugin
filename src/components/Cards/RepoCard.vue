<template>
        <div className="bg-white rounded-md overflow-hidden border shadow-md">
      <div className="p-4 flex flex-col h-full justify-between">
        <div>
          <h2 className="text-2xl text-gray-800 text-left" v-if="repoUrl.name">{{repoUrl.name}}</h2>
          <div className="flex justify-between mt-4 mb-4 text-gray-500">
            <div className="flex items-center">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
              <span className="ml-1 lg:text-xl">{{repoUrl.stargazers_count}}</span>
            </div>
            <div className="flex items-center">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
              <span className="ml-1 lg:text-xl">{{repoUrl.watchers_count}}</span>
            </div>
            <div className="flex items-center">
              <svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" class="w-6 h-6" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M7 5C7 3.89543 7.89543 3 9 3C10.1046 3 11 3.89543 11 5C11 5.74028 10.5978 6.38663 10 6.73244V14.0396H11.7915C12.8961 14.0396 13.7915 13.1441 13.7915 12.0396V10.7838C13.1823 10.4411 12.7708 9.78837 12.7708 9.03955C12.7708 7.93498 13.6662 7.03955 14.7708 7.03955C15.8753 7.03955 16.7708 7.93498 16.7708 9.03955C16.7708 9.77123 16.3778 10.4111 15.7915 10.7598V12.0396C15.7915 14.2487 14.0006 16.0396 11.7915 16.0396H10V17.2676C10.5978 17.6134 11 18.2597 11 19C11 20.1046 10.1046 21 9 21C7.89543 21 7 20.1046 7 19C7 18.2597 7.4022 17.6134 8 17.2676V6.73244C7.4022 6.38663 7 5.74028 7 5Z" fill="currentColor"></path></svg>
              <span className="ml-1 lg:text-xl">{{repoUrl.forks}}</span>
            </div>
          </div>
          <p className="mb-4 text-gray-600 flex">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
            {{repoUrl.language}}
          </p>
          <p className="mb-4 text-gray-500 text-left">{{repoUrl.description}}</p>
        </div>
        <div>
          <a
            className="no-underline"
            :href="repoUrl.html_url"
            target="_blank"
            rel="noreferrer"
          >
            <button className="flex justify-center items-center text-white bg-gray-800 p-4 rounded-md w-full uppercase">
              View Git Repository
              <div className="w-6">
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
        name : "RepoCard",
        props: ["repoUrl"]
    }
</script>

<style  scoped>

</style>