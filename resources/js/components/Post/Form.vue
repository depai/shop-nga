<template>
    <ValidationObserver v-slot="{ passes }">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <!-- <div class="row">
                        <div class="col-md-12">

                            <router-link :to="{ name:'listPost' }">
                                <button class="btn btn-primary pull-right mr-3 mt-3">
                                        <i class="fa fa-backward"></i> Trở về
                                </button>
                            </router-link>
                        </div>
                    </div> -->

                    <div class="box-body page-post">
                        <div class="col-md-12">
                            <div class="row">
                                <ul class="nav nav-tabs nav-tabs-profile" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#createOrUpdate" role="tab" aria-selected="true">
                                            Tạo mới / Cập nhật
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#previewBeforePost" role="tab" aria-selected="false">
                                            <i class="fa fa-eye"></i> Xem trước bài viết
                                        </a>
                                    </li>
                                </ul>

                            </div>

                            <div class="row">
                                <div class="tab-content w-100">
                                    <div class="tab-pane fade show active" id="createOrUpdate" role="tabpanel">
                                        <form @submit.prevent="passes(onSubmit)" class="pb-5" method="post">
                                            <div class="col-md-9 col-lg-9 plr-0">
                                                <div class="row form-group">
                                                    <label for="title" class="col-md-12 txt-bold">Tiêu đề</label>
                                                    <div class="col-md-12">
                                                        <ValidationProvider rules="required" name="Tiêu đề" v-slot="{ errors }">
                                                            <wysiwyg
                                                                v-bind:class="errors[0]?'border-danger':''"
                                                                v-model="post.title"
                                                                placeholder="Không quá 200 ký tự"
                                                                class="h-editor-40"
                                                            />

                                                            <span class="text-danger">{{ errors[0] }}</span>
                                                        </ValidationProvider>
                                                    </div>
                                                </div>

                                                <div class="row form-group">
                                                    <label for="title" class="col-md-12 txt-bold">SEO tiêu đề</label>
                                                    <div class="col-md-12">
                                                        <ValidationProvider rules="required" name="SEO tiêu đề" v-slot="{ errors }">
                                                            <textarea
                                                                v-model="post.seo_title"
                                                                class="form-control"
                                                                rows="3"
                                                                placeholder="Tùy chọn có thể bỏ nhập, tối đa 60 ký tự"
                                                                v-bind:class="errors[0]?'border-danger':''"
                                                            ></textarea>
                                                            <span class="text-danger">{{ errors[0] }}</span>
                                                        </ValidationProvider>
                                                    </div>
                                                </div>

                                                <div class="row form-group">
                                                    <label for="title" class="col-md-12 txt-bold">Mô tả</label>
                                                    <div class="col-md-12">
                                                        <ValidationProvider rules="required" name="Mô tả" v-slot="{ errors }">
                                                            <wysiwyg
                                                                v-bind:class="errors[0]?'border-danger':''"
                                                                v-model="post.description_short"
                                                                placeholder="Không quá 3 dòng văn bản"
                                                                class="h-editor-40"
                                                            />

                                                            <span class="text-danger">{{ errors[0] }}</span>
                                                        </ValidationProvider>
                                                    </div>
                                                </div>

                                                <div class="row form-group">
                                                    <label for="description" class="col-md-12 txt-bold">Nội dung</label>
                                                    <div class="col-md-12">
                                                        <ValidationProvider rules="required" name="Nội dung" v-slot="{ errors }">
                                                            <wysiwyg
                                                                v-bind:class="errors[0]?'border-danger':''"
                                                                v-model="post.description"
                                                                placeholder=""
                                                                class="editor"
                                                            />
                                                            <span class="text-danger">{{ errors[0] }}</span>
                                                        </ValidationProvider>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-lg-3">
                                                <div class="row form-group">
                                                    <label for="tag" class="col-md-12 txt-bold">Danh mục</label>
                                                    <div class="col-md-12">
                                                        <ValidationProvider rules="required" name="Danh mục" v-slot="{ errors }">
                                                            <multiselect
                                                                v-model="post.categories"
                                                                :options="allCategories"
                                                                label="name"
                                                                track-by="id"
                                                                placeholder="Lựa chọn danh mục"
                                                                v-bind:class="errors[0]?'border-danger':''"
                                                            ></multiselect>
                                                            <span class="text-danger">{{ errors[0] }}</span>
                                                        </ValidationProvider>
                                                    </div>
                                                </div>

                                                <div class="row form-group">
                                                    <label for="tag" class="col-md-12 txt-bold">Ảnh đại diện</label>
                                                    <div class="col-md-12 d-flex justify-content-start">
                                                        <div v-if="!post.image_thumb">
                                                            <label for="chooseImage">
                                                                <i class="fa fa-cloud-upload icon-upload-thumb"></i>
                                                            </label>
                                                            <ValidationProvider class="d-flex" rules="required" name="Ảnh đại diện" v-slot="{ errors }">
                                                                <input
                                                                    type="file"
                                                                    id="chooseImage"
                                                                    class="d-none"
                                                                    @change="onFileChange"
                                                                    v-bind:class="errors[0]?'border-danger':''"
                                                                >
                                                                <span class="text-danger">{{ errors[0] }}</span>
                                                            </ValidationProvider>
                                                        </div>
                                                        <div v-else class="text-center">
                                                            <img :src="showImage()" class="image-preview"/> <br/>
                                                            <button class="btn btn-sm btn-danger mt-2" @click="removeImage">Xóa ảnh</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row form-group">
                                                    <label for="status" class="col-md-12 txt-bold">Hiển thị bài viết</label>
                                                    <div class="col-md-12">
                                                        <input type="checkbox" id="switch" class="toggle-ios toggle-primary" v-model="post.status"/>
                                                        <label for="switch" class="tgl-checkbox tgl-primary"></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="row form-group">
                                                    <div class="col-md-12 text-center">
                                                        <button @click="refresh()" type="button" class="btn btn-sm btn-default" v-if="type==='create'">
                                                            <i class="fa fa-refresh"></i> Làm mới
                                                        </button>
                                                        <button type="submit" class="btn btn-sm btn-success">
                                                            <i class="fa fa-check"></i> Xác nhận
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="previewBeforePost" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="category">{{ post.categories.name ? post.categories.name : '' }}</p>
                                                <h1 class="title">{{ post.title }}</h1>
                                                <p v-if="type==='edit'"><b class="uploadBy">{{ infoUser.name }}</b> đăng lúc <span>{{ formatDate(post.updated_at) }}</span></p>
                                                <p v-else><b>{{ infoUser.name }}</b> đăng lúc <span>{{ formatDate(currentTime) }}</span></p>
                                                <p v-html="post.description">
                                                    {{ post.description ? post.description : '' }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </ValidationObserver>
</template>

<script>
import { ValidationProvider, ValidationObserver  } from 'vee-validate'
import { extend } from 'vee-validate'
import { mapState, mapActions } from 'vuex'
import Multiselect from 'vue-multiselect'
import ApiService from '../../api'

extend('required', {
    validate: (value, { required }) => {
        const length = value && value.length;
        return length >= 0
    },
    params: ['required'],
    message: '{_field_} không được để trống.'
});

export default {
    props: {
        type: String
    },
    data() {
        return {
            infoUser: '',
            currentTime: new moment(new Date())
        }
    },
    components: {
        ValidationProvider,
        ValidationObserver,
        Multiselect
    },
    mounted() {
        if (this.type === 'create') {
            this.clearPost()
        } else {
            let idPost = this.$route.params.id
            this.editPost(idPost)
        }
        this.getCategories()
        this.getInfoUser()
        this.getAllCategories()
    },
    computed: {
        ...mapState('post', ['post']),
        ...mapState('category', ['categories', 'allCategories'])
    },
    methods: {
        ...mapActions('post',['clearPost','addPost','editPost','updatePost']),
        ...mapActions('category', ['getCategories', 'getAllCategories']),
        onSubmit () {
            if (this.type === 'create') {
                this.addPost(this.post)
            } else {
                this.updatePost(this.post)
            }
        },
        refresh () {
            this.clearPost()
        },
        onFileChange (e) {
            var files = e.target.files || e.dataTransfer.files
            if (!files.length)
                return
            this.createImage(files[0])
        },
        createImage (file) {
            var image_thumb = new Image();
            var reader = new FileReader()
            var vm = this;

            reader.onload = (e) => {
                vm.post.image_thumb = e.target.result
            }
            reader.readAsDataURL(file)
        },
        removeImage (e) {
            this.post.image_thumb = ''
        },
        showImage () {
            let image = this.post.image_thumb
            if (image.length > 100) {
                return this.post.image_thumb
            } else {
                return '/public/images/post/'+this.post.image_thumb
            }
        },
        getInfoUser () {
            ApiService.get('/api/infoUser')
                .then(({
                    data
                }) => {
                    return this.infoUser = data
                })
                .catch(error => {
                    console.log(error)
                })
        },
        formatDate (date) {
            return moment(date).format('HH:mm DD/MM/YYYY')
        }
    }
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style lang="scss" scoped>
    .txt-bold {
        font-weight: 600 !important;
    }

    .page-post {
        .nav-tabs-profile .nav-link.active {
            background-color: #6c757d !important;
        }

        .nav-tabs-profile .nav-link {
            border-radius: 0px !important;
            padding: 10px !important;
            background-color: #ccc !important;
        }

        #previewBeforePost {
            font-family: 'Times New Roman', Times, serif;

            .category {
                text-transform: uppercase;
                font-size: 16px;
                color: #888;
                margin: 10px 0 5px 0;
            }

            .title {
                font-weight: 700;
                font-family: 'Times New Roman', Times, serif !important;
                margin: 0;
            }

            .uploadBy {
                font-size: 16px;
            }
        }
    }

    .plr-0 {
        padding-left: 0px;
        padding-right: 0px;
    }
</style>
