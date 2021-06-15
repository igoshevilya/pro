<template>
  <div class="mx-auto">
    <hooper :itemsToShow="5" :infiniteScroll="true">
      <slide> slide 1 </slide>
      <slide> slide 2 </slide>
      <slide> slide 3 </slide>
      <slide> slide 4 </slide>
      <slide> slide 5 </slide>
      <slide> slide 6 </slide>
    </hooper>
  </div>
</template>

<script>
import { Hooper, Slide } from "hooper";

export default {
  data() {
    return {};
  },
  components: {
    Hooper,
    Slide,
  },
  methods: {},
};
</script>
<style>
. {
  position: relative;
  box-sizing: border-box;
  width: 100%;
  height: 200px;
}
.hooper * {
  box-sizing: border-box;
}
.hooper-list {
  overflow: hidden;
  width: 100%;
  height: 100%;
}
.hooper-track {
  display: flex;
  box-sizing: border-box;
  width: 100%;
  height: 100%;
  padding: 0;
  margin: 0;
}
.hooper.is-vertical .hooper-track {
  flex-direction: column;
  height: 200px;
}

.hooper.is-rtl {
  direction: rtl;
}

.hooper-sr-only {
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  border: 0;
}
  
.hooper-slide {
  flex-shrink: 0;
  height: 100%;
  margin: 0;
  padding: 0;
  list-style: none;
}
</style>