<template>
  <div class="background">
 <div>{{ TotalOrder }}</div>
</div>
</template>

<script>
export default {
  name: 'Checkout',
  props: ['TotalOrder', 'total'],
  data() {
    return {
      }
  },
}
</script>

<style scoped>
.modal {
  z-index: 99;
  position: fixed;
  top:50%;
  left:50%;
}
.modal-background {
  width: 30em;
  min-height: 18em;
  margin-top: -9em;
  margin-left: -15em;
  border: 2px solid #000000;
  background-color: #343434;
  color: #ffffff;
  opacity: 0.9;
}
.checkout {
  text-align: center;
  font-size: 30px;
}
.alignRight {
  text-align: right;
}
</style>