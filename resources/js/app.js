import Vue from 'vue'
import VueMeta from 'vue-meta'
import { InertiaApp } from '@inertiajs/inertia-vue'
import 'styles/nprogress.css'

Vue.use(InertiaApp)
Vue.use(VueMeta)

Vue.prototype.$route = (...args) => route(...args)

const app = document.getElementById('app')

new Vue({
    metaInfo: {
        titleTemplate: title => (title ? `${title} - Laradash` : 'Laradash'),
    },
    render: h =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: name =>
                    import(`./Pages/${name}`).then(module => module.default),
            },
        }),
}).$mount(app)
