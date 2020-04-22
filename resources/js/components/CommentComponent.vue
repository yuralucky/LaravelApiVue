<template>
    <div class="comment">
        <div>{{tech1.body}}<a href="#" @click="deleteComment(tech1.id) ">x</a></div>
        <a href="#" @click="show =!show" class="btn">Reply</a>
        <transition name="fade" :duration="1000">
            <form-component v-if="show" v-bind:comment_id="index"></form-component>
        </transition>
        <ul v-if="tech1.children && tech1.children.length >0">
            <comment-component v-bind:tech1="child"
                               :key="child.id "
                               :index="child.id "
                               v-for="(child,index) in tech1.children">
            </comment-component>
        </ul>

    </div>
</template>

<script>
    import FormComponent from "./FormComponent";

    export default {
        name: "comment-component",
        components: {FormComponent},
        props: {
            comments: Object,
            tech1: Object,
            item: Object,
            index: Number,
            show: Boolean
        },
        methods: {
            deleteComment(id) {
                if (confirm("Do you really want to delete comment?")) {
                    let app = this;
                    window.axios.delete('/api/comments/' + id)
                        .then(function (resp) {
                            app.tech1.splice(index, 1);
                            console.log('Ok')
                        }
                            .catch(function (resp) {
                                alert("Could not delete comment");
                            }));
                }
            }
        },
    };
</script>
<style>
    .comment {
        padding-right: 10px;
        color: #111;
        font-size: 15px;
        line-height: 1.46;
        overflow: hidden;
        font-family: "-apple-system", BlinkMacSystemFont, Arial, sans-serif;
    }
</style>
