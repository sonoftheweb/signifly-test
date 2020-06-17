import Vue from 'vue'
import lodash from 'lodash'
import axios from 'axios'

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.withCredentials = true

Vue.prototype.$http = axios
Vue.prototype.$eventBus = new Vue()
Vue.prototype._ = lodash
