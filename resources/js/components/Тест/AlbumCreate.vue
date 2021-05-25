<template>
    <div class="container">
        <div class="card">
            <div class="card-header">Create Album</div>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form @submit.prevent="onSubmit" style="margin: 20px">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" placeholder="Title" v-model="title" :class="{'is-invalid': errorTitle}">
                            <div class="invalid-feedback">
                                 {{ errorTitle }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control" v-model="desc" placeholder="Description">
                        </div>

                        <button class="btn btn-lg btn-primary" type="submit">Go!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default{
        name: 'album.create',
      
        data() {
            return {
                title: '',
                errorTitle: null,

                desc: '',
            };
        },

       

        methods: {
            onSubmit() {
                let $this = this;

                if (this.title.length < 3) {
                    this.errorTitle = "Назавиние не должноы быть меньше 4 символов";
                    return null;
                }

                let data = {
                    title: $this.title,
                    desc: $this.desc,
                };

                this.loading = true;

                 axios.post('album', data)
                    .then(response => {
                        this.loading = false;
                        this.$router.push({name: 'album.show', params:  {id: response.data.id}})
                    })
            }
        }
    }
</script>
