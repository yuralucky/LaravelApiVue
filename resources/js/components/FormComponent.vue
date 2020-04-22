<template>
    <form method="post"
          id="comments_form" class="form form_comment-message">
        <div class="tm-editor__textarea-wrap">
        <textarea cols="40" rows="5" v-model="comment.body"
                  name="body"></textarea>
        </div>
        <input type="hidden" name="comment_id"  :value="comment_id">
        <div class="form__buttons form__buttons_comment js-form-buttons">
            <button type="button" @click.prevent="addComment()" name="send"
                    class="btn btn_x-large btn_blue">Add comment
            </button>
        </div>

    </form>

</template>

<script>
    export default {
        name: "FormComponent",
        data: function () {
            return {
                comment: {
                    'body': '',
                    'comment_id': ''
                }
            }
        },
        methods: {
            addComment() {
                // let app = this;
                let newComment = app.comment;
                window.axios.post('/api/comments/', newComment)
                    .then(function (resp) {
                        // app.comment.pus;
                        console.log(app.$attrs)

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
