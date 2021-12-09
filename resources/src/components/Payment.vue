<template>
  <v-braintree
    :authorization="authorization"
    @success="onSuccess"
    @error="onError"
    @onLoad="onLoad"
  ></v-braintree>
</template>

<script>
export default {
  name: 'Payment',
  props: ["authorization"],
  methods: {
    onSuccess(payload) {
      let nonce = payload.nonce;
      this.$emit("onSuccess", nonce);
    },
    onError(error) {
      let message = error.message;
      // Whoops, an error has occured while trying to get the nonce
    },
    onLoad() {
        this.$emit('onLoading')
    }
  },
};
</script>

<style>
</style>