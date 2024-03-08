<template>
    <div>
        <div class="card bg-white">
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                    <tr>

                        <th scope="col" @click="this.getForms('id', this.order)" class="d-flex justify-content-between"><span>#</span> <span><i :class='"fa fa-arrow-"+(order==="DESC" ? "up" : "down")'></i></span></th>
                        <th scope="col" >
                            Имя</th>
                        <th scope="col">Номер</th>
                        <th scope="col" @click="this.getForms('mark', this.order)" class="d-flex justify-content-between"><span>Машина</span>
<!--                            <span><i :class='"fa fa-arrow-"+(order==="DESC" ? "up" : "down")'></i></span>-->
                        </th>
                        <th scope="col" @click="this.getForms('created_at', this.order)" class="w-auto"><span>Дата</span>
<!--                            <span class="text-end"><i :class='"fa fa-arrow-"+(order==="DESC" ? "up" : "down")'></i></span>-->
                        </th>
                        <th scope="col">Кол-во компании</th>
                        <th scope="col">Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr  class="colored_row " v-for="form in forms">
                        <th scope="row">{{form.id}}</th>
                        <td>{{form.user.name ?? ''}}</td>
                        <td>{{form.user.phone ?? ''}}</td>
                        <td>{{form.mark + ' ' + form.model}}</td>
                        <td>{{ this.getTime(form.created_at) }}</td>
                        <td> {{ 0 }} </td>
                        <td>
                            <button class="btn btn-primary"  data-toggle="modal" @click="openDetail(form)" data-target="#detail_form"><i style="margin-left: -8px" class="fa fa-search"></i></button>

                            <button class="btn btn-danger" @click="deleteForm(form.id)" style="margin-left: 10px" v-if="user.id === 1">
                                <i class="fa fa-trash-alt text-white"></i>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade modal-lg" id="detail_form" tabindex="-1" role="dialog" aria-labelledby="detail_formLabel" aria-hidden="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detail_formLabel">{{ form.title }}</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex flex-row justify-content-between">
                            <div class="col-md-5">
                                <div class="d-flex overflow-scroll">
                                    <div
                                        v-for="(src, index) in this.form.images"
                                        :key="index"
                                        style="margin-right: 15px"
                                        @click="() => show(index)">
                                        <img :src="src" width="100"/>
                                    </div>
                                </div>
                                <vue-easy-lightbox
                                    :visible="visible"
                                    :imgs="this.form.images"
                                    :index="index"
                                    @hide="handleHide"
                                >

                                </vue-easy-lightbox>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-6">
                                <div class="group d-flex flex-column">
                                    <span><b>Год выпуска:</b> {{ this.form.year }}</span>
                                    <span><b>Пробег (км):</b> {{ this.form.mileage }}</span>
                                    <span><b>Объем двигателя (л):</b> {{ this.form.capacity }}</span>
                                    <span><b>Тип двигателя:</b> {{ this.form.engine_type }}</span>
                                    <span><b>Тип АКПП:</b> {{ this.form.transmission_type }}</span>
                                    <span><b>Привод:</b> {{ this.form.drive_unit }}</span>
                                    <span><b>Цвет:</b> {{ this.form.color }}</span>
                                    <span><b>В аресте?:</b> {{ this.form.arrested }}</span>
                                    <span><b>В залоге?:</b> {{ this.form.pledged }}</span>
                                    <span><b>Растаможен?:</b> {{ this.form.in_kz }}</span>
                                    <span><b>Состояние:</b> {{ this.form.crashed }}</span>
                                    <span><b>Руль:</b> {{ this.form.right_hand }}</span>
                                    <span><b>VIN :</b> {{ this.form.vin }}</span>
                                    <span><b>Комментарии :</b> {{ this.form.comment }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script >

import VueEasyLightbox from 'vue-easy-lightbox'
import moment from 'moment';
export default {
    components:{
        VueEasyLightbox,
    },
    props:['user'],
    created() {
        window.Echo.channel('my-channel')
        .listen('.my-event', res => {
            this.chats.push(res.sex)
        })

        window.Echo.channel('form-store.' + this.user.id)
            .listen('.form-store_event', res => {
                this.forms.unshift(res.form)
                let classes = document.getElementsByClassName('colored_row');
                let colored_row = classes[0]

                colored_row.classList.add('first_row_color')

                setTimeout(()=> colored_row.classList.remove('first_row_color'),2000)
            })
    },
    data() {
        return {
            visible: false,
            index: 0,
            forms: [],
            chats: [],
            order: "ASC",
            data:[
                [1, 2],
                [3, 4],
            ],
            form:{
                title: '',
                mileage: '',
                capacity: '',
                year: '',
                engine_type: '',
                transmission_type: '',
                drive_unit: '',
                color: '',
                arrested: '',
                pledged: '',
                in_kz: '',
                crashed: '',
                right_hand: '',
                vin: '',
                comment: '',
                verified: '',
                images: []
            }
        }
    },
    mounted() {
        console.log('Component mounted.')
        this.getForms('id', 'DESC')
    },
    methods:{
        getTime(timestamp){
            return moment(String(timestamp)).format("HH:mm / DD-MM-YYYY")
        },

        show(index) {
            this.index = index
            this.visible = true
        },
        handleHide() {
            this.visible = false
        },
        getForms(sort, order){
            if (this.order === 'ASC')
                this.order = 'DESC'
            else if (this.order === 'DESC')
                this.order = 'ASC'

            if (!sort)
                sort = 'id'
            axios
                .get('/forms/get?sort='+ sort +'&order='+order)
                .then((response) => {
                    this.forms = response.data;

                }).catch((error) => {
                alert('false')

            })
        },
        deleteForm(formId){
            if ( confirm('Вы действительно хотите удалить анкету?')){
                console.log('true')
                axios
                    .delete('/admin/forms/'+formId)
                    .then((response) => {
                        this.getForms('id', 'desc')
                        this.$swal({
                            title: "Удаление",
                            text: response.data,
                            icon: "success"
                        });

                    }).catch((error)=>{
                        this.$swal({
                            title: "Удаление",
                            text: error.response.data,
                            icon: "error"
                        });
                     })
                return;
            }
            console.log('false')
        },
        openDetail(form){
            this.form.title = form.mark + " " + form.model
            this.form.mileage = form.mileage
            this.form.capacity = form.capacity
            this.form.year = form.year
            this.form.engine_type = form.engine_type
            this.form.transmission_type = form.transmission_type
            this.form.drive_unit = form.drive_unit
            this.form.color = form.color
            this.form.arrested = form.arrested ? "Да" : "Нет"
            this.form.pledged = form.pledged ? "Да" : "Нет"
            this.form.in_kz = form.in_kz ? "Да" : "Нет"
            this.form.crashed = !form.crashed ? "Аварийное" : "На ходу"
            this.form.right_hand = !form.right_hand ? 'Правый' : 'Левый'
            this.form.vin = form.vin
            this.form.comment = form.comment


            let new_images = []
            for (let i = 0; i < form.images.length; i++) {
                let img = 'https://xcar.kz/storage'+form.images[i].url
                new_images.push(img)
            }
            this.form.images = new_images
        },
    },


}
</script>
<style>
.first_row_color{
    --bs-table-bg: #d9f6d0;
}
.table{
    --bs-table-striped-bg: white;
}
</style>
