require("./bootstrap");
window.Vue = require("vue");
Vue.component(
    "exercise-component",
    require("./components/ExerciseComponent.vue").default
);

export const bus = new Vue();

const app = new Vue({
    el: "#app"
});
