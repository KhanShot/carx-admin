<template>
    <div>
        <div class="card bg-white">
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Имя</th>
                        <th scope="col">Номер</th>
                        <th scope="col">Машина</th>
                        <th scope="col">Дата</th>
                        <th scope="col">Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="form in forms">
                        <th scope="row">{{form.id}}</th>
                        <td>{{form.user.name ?? ''}}</td>
                        <td>{{form.user.phone ?? ''}}</td>
                        <td>{{form.mark + ' ' + form.model}}</td>
                        <td><Timeago :locale="ru" :datetime="form.created_at"></Timeago></td>
                        <td>
                            <button class="btn btn-primary"  data-toggle="modal" @click="openDetail(form)" data-target="#detail_form"><i style="margin-left: -8px" class="fa fa-search"></i></button>
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
                                    <span><b>Состоит в аресте?:</b> {{ this.form.arrested }}</span>
                                    <span><b>Состоит в залоге?:</b> {{ this.form.pledged }}</span>
                                    <span><b>Растаможен в РК?:</b> {{ this.form.in_kz }}</span>
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

import { useTimeAgo, usePreferredLanguages } from '@vueuse/core'
import VueEasyLightbox from 'vue-easy-lightbox'
import timeago from 'vue-timeago3'

// import Pusher from "pusher-js";

// Pusher.logToConsole = true;
//
// let pusher = new Pusher('e550145445ce9016f3fe', {
//     cluster: 'ap1'
// });
//
// let channel = pusher.subscribe('form-created.' + 4);
// channel.bind('event-form_created', function(data) {
//     console.log(data)
// });

export default {
    components:{
        VueEasyLightbox,
        timeago,
    },
    data() {
        return {
            visible: false,
            index: 0,
            forms: [],
            languages: usePreferredLanguages(),
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
        this.getForms()
    },
    methods:{
        show(index) {
            this.index = index
            this.visible = true
        },
        handleHide() {
            this.visible = false
        },
        time_ago(time){
                return useTimeAgo(time, { updateInterval: 30_000})
        },
        getForms(){
            axios
                .get('/forms/get')
                .then((response) => {
                    this.forms = response.data;

                }).catch((error) => {
                alert('false')

            })
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
            this.form.arrested = form.arrested
            this.form.pledged = form.pledged
            this.form.in_kz = form.in_kz
            this.form.crashed = form.crashed
            this.form.right_hand = form.right_hand
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
