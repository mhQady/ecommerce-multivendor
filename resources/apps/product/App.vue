<script setup>
import { ref } from 'vue';

const payload = ref({
   name: {
      en: '',
      ar: '',
   },
   slug: {
      en: '',
      ar: '',
   }
})

const inputSlugAR = ref(null)
const inputSlugEN = ref(null)

function generateSlug(event, type) {
   console.log(event)
   let text = event.target.value.toString().toLowerCase()
      .replace(/\s+/g, '-')
      .replace(/[^\w\u0621-\u064A0-9-]+/g, '')
      .replace(/\-\-+/g, '-')
      .replace(/^-+/, '').replace(/-+$/, '');


   console.log(text, inputSlugEN.value, inputSlugAR.value);
}
</script>
<template>
   {{ payload }}
   <form method="post" action="{{ route('vendor.brands.store') }}" enctype="multipart/form-data">
      <div class="row">
         <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary mb-0">@lang('main.save')</button>
         </div>
         <div class="col-8">
            <div class="card mt-4">
               <div class="card-header pb-0">
                  <h5 class="font-weight-bolder">@lang('main.create.brand')</h5>
               </div>
               <div class="card-body">
                  <div class="row align-items-center">

                     <div class="col-6">
                        <div class="form-group">
                           <label>@lang('main.en.name')</label>
                           <input class="form-control" type="text" @keyup="generateSlug($event, 'en')"
                              v-model="payload.name.en" />
                        </div>
                     </div>
                     <div class="col-6">
                        <div class="form-group">
                           <label>@lang('main.ar.name')</label>
                           <input class="form-control" type="text" @keyup="generateSlug($event, 'ar')"
                              v-model="payload.name.ar" />
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-4">
            <div class="card mt-4">
               <div class="card-body">
                  <div class="row align-items-center">
                     <div class="col-12">
                        <div class="form-group">
                           <label>@lang('main.en.slug')</label>
                           <input ref="inputSlugEN" v-model="payload.slug.en" class="form-control" type="text" />
                        </div>
                     </div>
                     <div class="col-12">
                        <div class="form-group">
                           <label>@lang('main.ar.slug')</label>
                           <input ref="inputSlugAR" v-model="payload.slug.ar" class="form-control" type="text" />
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </form>
</template>
