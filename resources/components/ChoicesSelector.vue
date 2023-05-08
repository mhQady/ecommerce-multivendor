<script setup>
import { ref, onMounted, defineProps } from 'vue';
import Choices from 'choices.js';

const props = defineProps({
   'dataUrl': String,
   'selectedValue': {
      type: Number,
      default: 1,
   }
});
const emits = defineEmits(['selected'])

const selectorEle = ref(null);

onMounted(() => {

   const choices = new Choices(selectorEle.value, {
      searchEnabled: true,
      itemSelectText: "@lang('main.press_to_select')",
      shouldSort: false,
      searchPlaceholderValue: "@lang('main.type_to_search')",
   });

   axios.get(props.dataUrl).then(response => {
      const resp = response.data.data

      let statusOptions = []

      for (let key in resp) {
         statusOptions.push({ value: resp[key], 'label': key, selected: resp[key] === props.selectedValue });
      }

      choices.clearChoices();
      choices.setChoices(statusOptions);
   });

   choices.passedElement.element.addEventListener('change', (e) => {
      emits('selected', e.target.value)
   })

});
</script>

<template>
   <select class="form-control" ref="selectorEle"></select>
</template>
