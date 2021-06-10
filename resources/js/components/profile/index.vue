<template>
  <div>    
    <tabs
      :tabs="tabs"
      :currentTab="currentTab"
      :wrapper-class="'default-tabs'"
      :tab-class="'default-tabs__item'"
      :tab-active-class="'default-tabs__item_active'"
      :line-class="'default-tabs__active-line'"
      @onClick="handleClick"
    />
    <div class="content">
      <div v-if="currentTab === 'tab1'">
     <photo-profile/>
      </div>
      <div v-if="currentTab === 'tab2'">
       <album-profile/>
      </div>
      <div v-if="currentTab === 'tab3'">
       <service-profile/>
      </div>
        <div v-if="currentTab === 'tab4'">
       <review-profile/>
      </div>
    </div>
  </div>
</template>

<script>
import Tabs from './components/Tabs.vue';
const TABS = [{
  title: 'Фотографии',
  value: 'tab1',
}, {
  title: 'Альбомы',
  value: 'tab2',
}, {
  title: 'Услуги',
  value: 'tab3',
},{
  title: 'Отзывы',
  value: 'tab4',
}];
export default {
  components: {
    Tabs,
  },
  data: () => ({
    tabs: TABS,
    currentTab: 'tab1',
  }),
  methods: {
    handleClick(newTab) {
      this.currentTab = newTab;
    },
  },
}
</script>

<style lang="scss">
.default-tabs {
  position: relative;
  margin: 0 auto;
  &__item {
    display: inline-block;
    margin: 0 5px;
    padding: 10px;
    padding-bottom: 8px;
     color: gray;
    border: none;
    background-color: transparent;
    border-bottom: 2px solid transparent;
    cursor: pointer;
    transition: all 0.25s;
    &_active {
      color: black;
    }
    &:hover {
      border-bottom: 2px solid gray;
      color: black;
    }
    &:focus {
      outline: none;
      border-bottom: 2px solid gray;
      color: black;
    }
    &:first-child {
      margin-left: 0;
    }
    &:last-child {
      margin-right: 0;
    }
  }
  &__active-line {
    position: absolute;
    bottom: 0;
    left: 0;
    height: 2px;
    background-color: black;
    transition: transform 0.4s ease, width 0.4s ease;
  }
}
.content {
  margin-top: 30px;
  font-size: 20px;
}
@media screen and (max-width: 650px) {
.default-tabs {
 
  &__item {
  
    margin: 0 0px;
    
    }
  }
 
}

</style>