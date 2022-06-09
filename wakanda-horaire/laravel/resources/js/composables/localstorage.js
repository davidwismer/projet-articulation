import { ref, watch } from "vue";

export function useLocalstorage(key, defaultVal = null) {

  let data = localStorage.getItem(key);


  if (data !== null) {
    data = JSON.parse(data);
  } else {
    localStorage.setItem(key, JSON.stringify(defaultVal));
    data = defaultVal;
  }

  const value = ref(data);

  watch(value, () => {
    localStorage.setItem(key, JSON.stringify(value.value));
  }, {deep: true}); 
  return { value };
}

