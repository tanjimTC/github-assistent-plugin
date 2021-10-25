<template>
    <div id="myDIV" class="text-center">
        <button class="active tabItems" @click="addClass('Tab1',$event)">Repos</button>
        <button class="tabItems" @click="addClass('Tab2',$event)">Followers</button>
        <button class="tabItems" @click="addClass('Tab3',$event)">Following</button>
        <keep-alive >
            <component :is="currentTabComponent" :singleUser="singleUser"></component>
        </keep-alive>
    </div>
</template>

<script>

    import Tab1 from "./RepoTab.vue";
    import Tab2 from "./FollowersTab.vue";
    import Tab3 from "./FollowingTab.vue";

    export default {
        name : "TabContainer",
        props : ["singleUser"],
        components: {
            Tab1,
            Tab2,
            Tab3,
        },
        data () {
            return {
                currentTabComponent: "Tab1",
            }
        },
        methods: {
            addClass(args ,event){
                this.currentTabComponent = args;
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace("active", "");
                event.target.classList.add('active');
            }
        }
    }
</script>

<style  scoped>
.active{
    color: blue;
    font-weight: bold;
    border-top: 1px solid rgba(44, 43, 43, 0.658);
    border-left: 1px solid rgba(44, 43, 43, 0.658);
    border-right: 1px solid rgba(44, 43, 43, 0.658);
    border-bottom: 1px solid white !important;

}
.tabItems{
    padding : 20px 40px;
    margin : 10px 0;
    border-bottom: 1px solid rgba(44, 43, 43, 0.658);

}
</style>