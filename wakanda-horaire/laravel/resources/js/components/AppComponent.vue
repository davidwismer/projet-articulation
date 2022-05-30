<script setup>
import {ref}  from "vue"

// const message = ref('hello')
export default {
	data () {
		return {
			message : "Bienvenue sur Vue 3"
		}
	}
}
</script>

<template>
	<div>
		<h1>{{ message }}</h1>
	</div>
</template>