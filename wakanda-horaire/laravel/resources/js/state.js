import { ref } from "vue";
import { useLocalstorage } from "./composables/localstorage";

export const page = ref('horaires');

export const { value: user} = useLocalstorage('userinfos', []);
