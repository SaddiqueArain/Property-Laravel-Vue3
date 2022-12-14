import {createApp} from 'vue';
import App from "./App.vue";
import router from "~/frontsite/router";
import store from '~/frontsite/store';
import Child from "~/frontsite/components/utilities/Child";
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";
import VueElementLoading from "vue-element-loading";
const app = createApp({
    ...App
})
.use(store)
.use(router)
.use(Toast, {timeout: 3500});
router.app = app;

// Global Component Registration
[
    Child,
    VueElementLoading
].forEach(Component => {
    app.component(Component.name, Component);
});
store.$app = app;
router.isReady().then(() => {
    app.mount('#app')
});
