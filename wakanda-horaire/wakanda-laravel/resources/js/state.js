import { ref } from "vue";
import { useLocalstorage } from "./composables/localstorage";

//Page state pour pouvoir importer les données facilement sur d'autres composants.
export const page = ref('horaires');

export const user = ref(null);