<template>
    <form method="post"
          id="comments_form" class="form form_comment-message">
        <div class="tm-editor__textarea-wrap">
        <textarea cols="40" rows="5" v-model="comment.body"
                  name="body"></textarea>
        </div>
        <div>
            <!--            <input type="number" name="comment_id" :value="index">-->
        </div>
        <div class="form__buttons form__buttons_comment js-form-buttons">
            <button type="button" @click.prevent="addComment(index)" name="send"
                    class="btn btn_x-large btn_blue">Add comment
            </button>
        </div>

    </form>

</template>

<script>
    export default {
        name: "FormComponent",
        props: ['index'],
        data: function () {
            return {
                comment: {
                    'body': '',
                    'comment_id': ''
                }
            }
        },
        methods: {
            addComment(index) {
                let app = this;
                let newComment = app.comment;
                newComment.comment_id = index;
                window.axios.post('/api/comments/', newComment)
                    .then(function (resp) {
                        console.log('Add new comment')
                    })
                    .catch(function (resp) {
                        alert("Could not add comment");
                    });

            }

        }


    }
</script>

<style scoped>
    #comments_form {
        position: relative;
        margin: 40px 0;
        border: 1px solid #e4e8ea;
        color: #333;
        font-family: "-apple-system", BlinkMacSystemFont, Arial, sans-serif;
    }
</style>
